<?php

    use Core\Database;
    use Core\App;

    $db = App::resolve(Database::class);

    $title = "Delete Product | Admin Gym Builder";
    $product = $db->query('select * from products where product_id = ?', [$_POST["product_id"]])->findOrFail();

    $db->query("DELETE from products where product_id = ?", [$product["product_id"]]);
    header("Location: /admin/products");
    exit;
?>