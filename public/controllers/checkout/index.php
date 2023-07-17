<?php
    use Core\Database;
    use Core\App;
    $db = App::resolve(Database::class);

    $errors = [];
    
    $user = $db->query('select user_id from users where email = ? ', [$_SESSION["user"]["email"]] )->findOrFail();
    $carts = $db->query('select * from cart where user_id = ?', [$user["user_id"]])->get();
    $address = $db->query('select * from addresses where user_id = ? ORDER BY address_id DESC', [$user["user_id"]] )->find();

    foreach($carts as &$cart){
        $product = $db->query('select * from products where product_id = ?', [$cart["product_id"]])->find();
        $cart["product"] = $product;
    }

    view("/checkout/index.php", [
        'title' => 'Checkout | Gym Builder Equipments',
        "carts" => $carts,
        "address" => $address,
        "errors" => $errors,
    ]);
?>