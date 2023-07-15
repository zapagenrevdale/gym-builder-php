<?php

    use Core\Database;
    use Core\App;

    $title = "Orders | Admin Gym Builder";

    $db = App::resolve(Database::class);

    $orders = $db->query('select * from orders')->get();

    $map_status = [
        0 => "unpaid",
        1 => "paid"
    ];
 
    foreach($orders as &$order){
        $order["orderitems"] = $db->query("SELECT * FROM orderitems where order_id = ?", [$order["order_id"]])->get();
        $order["user"] = $db->query("SELECT * FROM users where user_id = ?", [$order["user_id"]])->find();
        foreach($order["orderitems"] as &$orderitem){
            $orderitem["product"] = $db->query("SELECT * FROM products where product_id = ?", [$orderitem["product_id"]])->find();
        }
    }

    view("admin/orders/index.php", [ 
        "title" => $title,
        "orders" => $orders, 
    ]);

?>