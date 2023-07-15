<?php
    use Core\Database;
    use Core\App;
    use Core\PaymongoAPI;

    if(!isset($_GET["payment_intent_id"])){
        abort(404);
    }

    $db = App::resolve(Database::class);

    $paymongoAPI = App::resolve(PaymongoAPI::class);

    $payment = $db->query("SELECT * FROM payments WHERE payment_intent_id = ?", [$_GET["payment_intent_id"]])->findOrFail();
    
 

    $sourceID = $payment["source_id"];

    $sourceRetrievedData = json_decode($paymongoAPI->payment_source_retrieve($sourceID));
    $status = $sourceRetrievedData->data->attributes->status;

    if($status === "consumed" ){
        $db->query("UPDATE orders SET status = ? where order_id = ?", [1, $payment["order_id"]]);
    }else{
        $db->query("UPDATE orders SET delivery_status = ? where order_id = ?", ["cancelled", $payment["order_id"]]);
        $order_items = $db->query("SELECT * FROM orderitems where order_id = ?", [$payment["order_id"]])->get();
        foreach($order_items as $order_item){
            $db->query("UPDATE products SET item = item + ? where product_id = ?", [$order_item["quantity"], $order_item["product_id"]]);
        }
    }

    view("/payment/index.php", [
        'title' => 'Payment Status | Gym Builder Equipments',
        "status" => $status,
    ]);
?>