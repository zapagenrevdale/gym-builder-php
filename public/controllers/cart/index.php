<?php
    use Core\Database;
    use Core\App;
    $db = App::resolve(Database::class);

    if(isset($_SESSION['admin'])){
        abort(403);
    }
    
    $user = $db->query('select user_id from users where email = ? ', [$_SESSION["user"]["email"]] )->findOrFail();
    $carts = $db->query('select * from cart where user_id = ?', [$user["user_id"]])->get();

    
    $updatedCarts = [];

    foreach($carts as $cart){
        $product = $db->query('select * from products where product_id = ?', [$cart["product_id"]])->find();
        $cart["product"] = $product;
        array_push($updatedCarts, $cart);
    }

    $shipping_fee = $db->query('select * from defaults where key_name = "shipping_fee"')->find();
    $installation_fee = $db->query('select * from defaults where key_name = "installation_fee"')->find();


    view("/cart/index.php", [
        'title' => 'My Cart | Gym Builder Equipments',
        "carts" => $updatedCarts,
        "installation_fee" => $installation_fee["value"],
        "shipping_fee" => $shipping_fee["value"],
    ]);
?>