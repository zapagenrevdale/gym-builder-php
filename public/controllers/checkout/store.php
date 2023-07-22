<?php

use Core\App;
use Core\Database;
use Core\PaymongoAPI;


$db = App::resolve(Database::class);

$config = require base_path('config.php');


$user = $db->query('select * from users where email = ? ', [$_SESSION["user"]["email"]] )->findOrFail();
$carts = $db->query('select * from cart where user_id = ?', [$user["user_id"]])->get();
$address = $db->query('select * from addresses where user_id = ? ORDER BY address_id DESC', [$user["user_id"]] )->find();

if(!$address){
    foreach($carts as &$cart){
        $product = $db->query('select * from products where product_id = ?', [$cart["product_id"]])->find();
        $cart["product"] = $product;
    }
    view("/checkout/index.php", [
        'title' => 'Checkout | Gym Builder Equipments',
        "carts" => $carts,
        "address" => $address,
        "errors" => ["address" => "Address is missing. Please Update!"],
    ]);
    exit();
}

if($user["verified"] == 0){
    foreach($carts as &$cart){
        $product = $db->query('select * from products where product_id = ?', [$cart["product_id"]])->find();
        $cart["product"] = $product;
    }
    view("/checkout/index.php", [
        'title' => 'Checkout | Gym Builder Equipments',
        "carts" => $carts,
        "address" => $address,
        "errors" => ["email" => "Email should be verified first!"],
    ]);
    exit();
}

$SHIPPING_FEE = 100;
$total_price = $SHIPPING_FEE;
foreach($carts as &$cart){
    $product = $db->query('select * from products where product_id = ?', [$cart["product_id"]])->find();
    $db->query("UPDATE products SET item = ? where product_id = ?", [$product["item"]-$cart["quantity"], $product["product_id"]]);
    $cart["product"] = $product;
    $total_price += $product["price"] * $cart["quantity"];
}

$currentDateTime = date('Y-m-d H:i:s');

$db->query('INSERT INTO orders(user_id, address_id, order_date, total_amount, delivery_status) VALUES(?, ?, ?, ?, ?)', [
    $user["user_id"],
    $address["address_id"],
    $currentDateTime,
    $total_price,
    "processing",
]);

$order = $db->query('SELECT * FROM orders WHERE user_id = ? AND order_date = ?', [
    $user["user_id"],
    $currentDateTime,
])->find();


$order_string = "";
foreach($carts as &$cart){
    $db->query('INSERT INTO orderitems(order_id, product_id, quantity, price) VALUES(?, ?, ?, ?)', [
        $order["order_id"],
        $cart["product"]["product_id"],
        $cart["quantity"],
        $cart["product"]["price"] * $cart["quantity"],
    ]);
    $order_string .= $cart["quantity"] . 'x ' . $cart["product"]["name"] . ',';
    $db->query("DELETE FROM cart where product_id = ?", [$cart["product"]["product_id"]]);
}

$referenceNumber = strtoupper(substr(uniqid(), 0, 10));

if($_POST["payment"] === '1'){
    $exceptionCaught = false;
    try{
        $paymongoAPI = App::resolve(PaymongoAPI::class);

        $resource = $paymongoAPI::build_paymentintent_gcash(
            $data = [
                "userid" => (string)$user["user_id"],
                "transactionkey" => (string)$referenceNumber,
                "amount" => intval($total_price * 100),
                "product" => "Gym Builder Equipments",
                "order" =>(string)$order_string
            ]
        );

        $paymentIntentData = json_decode($paymongoAPI->payment_intent_create(json_encode($resource)));
    
        $resource = $paymongoAPI::build_paymentmethod_gcash();
        $paymentMethodData = json_decode($paymongoAPI->payment_method_create(json_encode($resource)));

        $resource = $paymongoAPI::build_paymentintent_attach(
            $data = [
                "method_id" => $paymentMethodData->data->id,
                "client_key" => $paymentIntentData->data->attributes->client_key,
                "return_url" => $config['return-uri']
            ]
        );

        $paymentIntentAttachData = json_decode($paymongoAPI->payment_intent_attach($paymentIntentData->data->id, json_encode($resource)));

        $redirect_url = $paymentIntentAttachData->data->attributes->next_action->redirect->url;

        $parsedUrl = parse_url($paymentIntentAttachData->data->attributes->next_action->redirect->url);
        $timestamp = $paymentIntentAttachData->data->attributes->created_at;

        // Get the query string from the parsed URL
        $queryString = $parsedUrl['query'];
        parse_str($queryString, $queryParams);
        $sourceID = $queryParams["id"];

        $payment_date = date("Y-m-d H:i:s", $timestamp);

    }catch (Exception $e) {
        // Catch any exception that is thrown
    
        // Handle the exception
        $message = "ORDER ID: " . $order["order_id"] . " | ". $e->getMessage();
        $db->query("INSERT INTO error_log(error_message) VALUES(?)", [$message]);

        $exceptionCaught = true;

    } catch (Error $e) {
        // Catch any PHP error that is thrown
    
        // Handle the error
        $message = "ORDER ID: " . $order["order_id"] . " | ". $e->getMessage();
        $db->query("INSERT INTO error_log(error_message) VALUES(?)", [$message]);

        $exceptionCaught = true;
    }

    if($exceptionCaught){
        $db->query("UPDATE orders SET delivery_status = ? where order_id = ?", ["cancelled", $order["order_id"]]);
        $order_items = $db->query("SELECT * FROM orderitems where order_id = ?", [$order["order_id"]])->get();
        foreach($order_items as $order_item){
            $db->query("UPDATE products SET item = item + ? where product_id = ?", [$order_item["quantity"], $order_item["product_id"]]);
        }

        view("/payment/index.php", [
            'title' => 'Payment Status | Gym Builder Equipments',
            "status" => "Payment Failed!",
        ]);
        exit();
    }else{
        $db->query("INSERT INTO payments(order_id, payment_method, transaction_id, amount, payment_date, payment_intent_id, source_id) VALUES(?, ?, ?, ?, ?, ?, ?)", [
            $order["order_id"],
            "gcash",
            $referenceNumber,
            $total_price,
            $payment_date,
            $paymentIntentAttachData->data->id,
            $sourceID 
        ]);
        header("Location: " . $redirect_url);
    }
    

}else{
    $db->query("INSERT INTO payments(order_id, payment_method, transaction_id, amount, payment_intent_id, source_id) VALUES(?, ?,  ?, ?, ?, ?)", [
        $order["order_id"],
        "cash",
        $referenceNumber,
        $total_price,
        "",
        ""
    ]);

    header("Location: /profile/orders");

}




?>