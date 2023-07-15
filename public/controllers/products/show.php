<?php

    use Core\Database;
    use Core\App;

    if(!isset($_GET["product_id"])){
        abort(404);
    }

    $db = App::resolve(Database::class);
    
    $_SESSION['previous_route'] = $_SERVER['REQUEST_URI'];
    
    $product = $db->query('select * from products where product_id = ?', [$_GET["product_id"]])->findOrFail();
    $tutorial = $db->query('select * from tutorials where product_id = ?', [$_GET["product_id"]])->find();
    $title = $product["name"] ." | Admin Gym Builder";
 
    view("products/show.php", [
        "title" => $title,
        "product" =>  $product,
        "tutorial" =>  $tutorial,
    ]);
?>