<?php
    use Core\Database;
    use Core\App;
    $db = App::resolve(Database::class);

    
    $user = $db->query('select user_id from users where email = ? ', [$_SESSION["user"]["email"]] )->findOrFail();
    $carts = $db->query('select * from cart where user_id = ?', [$user["user_id"]])->get();

    
    $updatedCarts = [];

    foreach($carts as $cart){
        $product = $db->query('select * from products where product_id = ?', [$cart["product_id"]])->find();
        $cart["product"] = $product;
        array_push($updatedCarts, $cart);
    }

    view("/cart/index.php", [
        'title' => 'My Cart | Gym Builder Equipments',
        "carts" => $updatedCarts
    ]);
?>