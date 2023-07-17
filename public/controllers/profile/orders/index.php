<?php

    use Core\Database;
    use Core\App;


    $db = App::resolve(Database::class);
    
    $user = $db->query('select * from users where email = ? ', [$_SESSION["user"]["email"]] )->findOrFail();
    $title = "My Account | Gym Builder Equipments";

    $orders = $db->query("SELECT orders.*, payments.payment_method FROM orders INNER JOIN payments ON payments.order_id = orders.order_id where user_id = ? ORDER BY order_date DESC", [$user["user_id"]])->get();

    $map_status = [
        0 => "unpaid",
        1 => "paid"
    ];

    foreach($orders as &$order){
        $order["orderitems"] = $db->query("SELECT * FROM orderitems where order_id = ?", [$order["order_id"]])->get();
        $order["status"] = $map_status[$order["status"]];
        $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $order["order_date"]);
        $order["order_date"] =  $datetime->format('F d, Y');
        foreach($order["orderitems"] as &$orderitem){
            $orderitem["product"] = $db->query("SELECT * FROM products where product_id = ?", [$orderitem["product_id"]])->find();
            $orderitem["review"] = $db->query("SELECT * FROM reviews where order_item_id = ?", [$orderitem["order_item_id"]])->find();
        }
    }


    
    view("profile/orders/index.php", [
        "title" => $title,
        "orders" =>  $orders,
    ]);
?>