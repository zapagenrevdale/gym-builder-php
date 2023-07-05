<?php
    use Core\Database;
    use Core\App;
    $db = App::resolve(Database::class);

    $products = $db->query('select * from products')->get();
    view("index.view.php", [
        'title' => 'Home | Gym Builder Equipments',
        "products" => $products
    ]);
?>