<?php

use Core\App;
use Core\Validator;
use Core\Database;
use Model\Email\Entity;
use Core\Email\EmailVerification;

$title = "Reset Password | Gym Builder Equipments";

$db = App::resolve(Database::class);

$errors = [];
$success = [];

$user = $db->query("SELECT * FROM users where email = ?", [$_POST["email"]])->find();


if(! Validator::email($_POST["email"]) || !$user){
    view('reset/create.php', [
        "title" => $title,
        'errors' => [
            'email' => 'No matching email found!'
        ],
        'success' => $success
    ]);
    exit();
}


if($user["admin"] == "1"){
    view('reset/create.php', [
        "title" => $title,
        'errors' => [
            'email' => 'Administrator should not be reset here!'
        ],
        'success' => $success
    ]);
    exit();
}

function generateResetToken() {
    $token = uniqid('', true);
    $token = str_replace('.', '', $token); // Remove dots from the token for better usability
    return $token;
}

$emailverify = App::resolve(EmailVerification::class);
$receiver = new Entity($user["email"], $user["first_name"]. ' '.$user["last_name"]);
$token = generateResetToken();

$db->query("INSERT INTO password_reset_tokens(email, token, expires_at) VALUES(?, ?, ?) ", [
    $_POST["email"],
    $token,
    date('Y-m-d H:i:s', strtotime('+5 minutes'))
]);

$link = "https://gymbuilderph.com/reset-password?email=". $user["email"] . "&token=" . $token;
$emailverify->sendEmailResetLink($receiver, $link);

view('reset/create.php', [
    "title" => $title,
    'errors' => $errors,
    'success' => [
        'email' => 'Reset link is sent on your email.'
    ]
]);



?>