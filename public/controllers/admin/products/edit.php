<?php

    use Core\Database;
    use Core\App;

    if(!isset($_GET["product_id"])){
        abort(404);
    }

    $db = App::resolve(Database::class);

    $title = "Edit Product | Admin Gym Builder";
    $edit_product = $db->query('select * from products where product_id = ?', [$_GET["product_id"]])->findOrFail();

    require view("admin/products/edit.php", [
        "title" => $title,
        "edit_product" =>  $edit_product
    ]);
?>