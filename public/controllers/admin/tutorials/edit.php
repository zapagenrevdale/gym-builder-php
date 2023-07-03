<?php

    use Core\Database;
    use Core\App;

    if(!isset($_GET["tutorial_id"])){
        abort(404);
    }

    $db = App::resolve(Database::class);

    $title = "Edit Product | Admin Gym Builder";
    $edit_tutorial = $db->query('select * from tutorials where tutorial_id = ?', [$_GET["tutorial_id"]])->findOrFail();
    $products = $db->query('select * from products')->get();
    
    view("admin/tutorials/edit.php", [
        "title" => $title,
        "edit_tutorial" =>  $edit_tutorial,
        "products" => $products
    ]);

?>