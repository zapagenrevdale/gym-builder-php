<?php

    use Core\Database;
    use Core\App;

    $title = "Products | Admin Gym Builder";

    $db = App::resolve(Database::class);

    $products = $db->query('select * from products')->get();
    view("admin/products/index.php", [ 
        "title" => $title,
        "products" => $products, 
    ]);

?>