<?php

    use Core\Database;
    use Core\App;

    $title = "Dashboard | Admin Gym Builder";

    $db = App::resolve(Database::class);

    $products = $db->query('SELECT products.*, SUM(orderitems.quantity) 
                            AS quantity FROM orderitems LEFT JOIN products ON 
                            orderitems.product_id = products.product_id 
                            INNER JOIN orders
                            ON orderitems.order_id = orders.order_id
                            WHERE orders.delivery_status <> "cancelled"
                            GROUP BY product_id ORDER by quantity DESC', [])->get();
                            
    $earnings_paid = $db->query("SELECT SUM(total_amount) as amount from orders where status = 1 and delivery_status <> 'cancelled'")->find();
    $earnings_unpaid = $db->query("SELECT SUM(total_amount) as amount from orders where status <> 1 and delivery_status <> 'cancelled'")->find();
    $delivery_successful = $db->query("SELECT COUNT(delivery_status) as amount from orders where delivery_status = 'delivered'")->find();
    $delivery_ongoing = $db->query("SELECT COUNT(delivery_status) as amount from orders where delivery_status = 'processing' or delivery_status = 'delivering' ")->find();
    $delivery_cancelled= $db->query("SELECT COUNT(delivery_status) as amount from orders where delivery_status = 'cancelled'  ")->find();
   
    $ongoing_deliveries = $db->query("SELECT o.*, u.* from orders as o INNER JOIN users as u ON u.user_id = o.user_id where o.delivery_status = 'processing' or o.delivery_status = 'delivering' ")->get();
    
    foreach($ongoing_deliveries as &$delivery){
        $delivery["order_items"] = $db->query("SELECT COUNT(order_item_id) as count FROM orderitems where order_id = ? ", [$delivery["order_id"]])->find()["count"];
        $delivery["long_status"] = $db->query("SELECT status FROM delivery_status WHERE order_id = ? ORDER BY status_id DESC", [$delivery["order_id"]])->find();
        $delivery["long_status"] = $delivery["long_status"]? $delivery["long_status"]["status"] : "";
    }

    view("admin/dashboard.view.php", [ 
            "title" => $title,
            "products" => $products,
            "earnings_paid" => $earnings_paid,
            "earnings_unpaid" => $earnings_unpaid,
            "delivery_successful" => $delivery_successful,
            "delivery_ongoing" => $delivery_ongoing,
            "delivery_cancelled" => $delivery_cancelled,
            "ongoing_deliveries" => $ongoing_deliveries,

        ]);




?>