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
    $delivery_ongoing= $db->query("SELECT COUNT(delivery_status) as amount from orders where delivery_status = 'processing' or delivery_status = 'delivering' ")->find();
    $delivery_cancelled= $db->query("SELECT COUNT(delivery_status) as amount from orders where delivery_status = 'cancelled'  ")->find();
   
    view("admin/dashboard.view.php", [ 
        "title" => $title,
        "products" => $products,
        "earnings_paid" => $earnings_paid,
        "earnings_unpaid" => $earnings_unpaid,
        "delivery_successful" => $delivery_successful,
        "delivery_ongoing" => $delivery_ongoing,
        "delivery_cancelled" => $delivery_cancelled,

    ]);




?>