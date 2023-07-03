<?php

    use Core\Database;
    use Core\App;

    $title = "Products | Admin Gym Builder";

    $db = App::resolve(Database::class);

    // if(isset($_GET["edit"])){
    //     $edit_product = $db->query('select * from products where product_id = ?', [$_GET["edit"]])->findOrFail();
    // }else {
    //     $products = $db->query('select * from products')->get();
    // }

    $products = $db->query('select * from products')->get();
    view("admin/products/index.php", [ 
        "title" => $title,
        "products" => $products, 
    ]);

?>