<?php

use Core\App;
use Core\Validator;
use Core\Database;

$title = "Create Cart Item | Admin Gym Builder";

$db = App::resolve(Database::class);
$errors = [];

if(isset($_SESSION['admin'])){
    abort(403);
}

if(!isset($_SESSION['user'])){
    header('location: /login');
    exit;
}
$user = $db->query("select * from users where email = ?", [$_SESSION["user"]["email"]])->findOrFail();

$cart_item = $db->query("SELECT * from cart WHERE user_id = ?  and product_id = ?", [$user["user_id"], $_POST["product_id"]])->find();

if($cart_item){
    $product = $db->query('select * from products where product_id = ?', [$_POST["product_id"]])->findOrFail();
    $db->query("UPDATE cart SET quantity = LEAST(quantity + ?, ?) WHERE cart_id = ?", [
        $_POST["quantity"],
        $product["item"],
        $cart_item["cart_id"],
    ]);

}else{
    $db->query("INSERT INTO cart(user_id, product_id, quantity) VALUES(?, ?, ?) ", [
        $user["user_id"],
        $_POST["product_id"],
        $_POST["quantity"]
    ]);
    
}


header('location: /cart');
exit;
?>