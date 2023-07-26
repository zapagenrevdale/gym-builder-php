<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

if(! isset($_GET["email"]) || !isset($_GET["token"]) ){
    abort(403);
}

$user = $db->query("SELECT * FROM password_reset_tokens where email = ? and token = ? and ? <= expires_at", [
        $_GET["email"], 
        $_GET["token"],
        date('Y-m-d H:i:s'),
    ])->findOrFail();

$errors = [];
$success = [];

view("reset/edit.php",[
    'title' => 'Change Password | Gym Builder Equipments',
    'errors' => $errors,
    'success' => $success,
    "email" => $_GET["email"]
]);
?>