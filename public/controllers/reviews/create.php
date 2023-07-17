<?php
    use Core\Database;
    use Core\App;
    $db = App::resolve(Database::class);

    if(!isset($_GET["order_item_id"])){
        abort(404);
    }

    $user = $db->query('select user_id from users where email = ? ', [$_SESSION["user"]["email"]] )->findOrFail();
    $order_item = $db->query("SELECT * FROM orderitems where order_item_id = ?", [$_GET["order_item_id"]])->findOrFail();
    $order = $db->query("SELECT * FROM orders where order_id = ? and user_id = ?", [$order_item["order_id"], $user["user_id"]])->findOrFail();
    $datetime = DateTime::createFromFormat('Y-m-d H:i:s', $order["order_date"]);
    $order["order_date"] =  $datetime->format('F d, Y');
    $product = $db->query("SELECT * FROM products where product_id = ? ", [$order_item["product_id"]])->findOrFail();

    view("/reviews/create.php", [
        'title' => 'Add Review | Gym Builder Equipments',
        "order_item" => $order_item,
        "order" => $order,
        "product" => $product,
    ]);
?>