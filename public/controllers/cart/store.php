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

$db->query("INSERT INTO cart(user_id, product_id, quantity) VALUES(?, ?, ?) ", [
    $user["user_id"],
    $_POST["product_id"],
    $_POST["quantity"]
]);

header('location: /cart');
exit;
?>