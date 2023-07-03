<?php
    use Core\Database;
    use Core\App;

    $title = "Create Tutorial | Admin Gym Builder";

    $db = App::resolve(Database::class);
    $products = $db->query('select * from products')->get();
    view("admin/tutorials/create.php", [
        "title" => $title,
        "products" => $products,
    ]);
?>