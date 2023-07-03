<?php

use Core\App;
use Core\Validator;
use Core\Database;

$title = "Create User | Gym Builder Equipment";

$db = App::resolve(Database::class);
$errors = [];

if (! Validator::string($_POST['first_name'], 1, 255)) {
    $errors['first_name'] = 'Please enter a valid name (1 - 255 characters)';
}

if (! Validator::string($_POST['last_name'], 1, 255)) {
    $errors['last_name'] = 'Please enter a valid name (1 - 255 characters)';
}

if (! Validator::email($_POST['email'])) {
    $errors['email'] = 'Please enter a valid email';
}

if(! Validator::password($_POST['password'])) {
    $errors['password'] = 'Password should be at least 6 characters and contains one lower and uppercase character';
}

$user = $db->query('select * from users where email = ?', [$_POST['email']])->find();

if($user){
    $errors['email'] = 'Email already exists!';
}

if(! empty($errors)){
    return view("register.view.php", [
        "title" => $title,
        "errors" => $errors
    ]);
}

$db->query('INSERT INTO users(first_name, last_name, email, password) VALUES(?, ?, ?, ?)', [
    $_POST["first_name"], 
    $_POST["last_name"], 
    $_POST["email"], 
    password_hash($_POST["password"], PASSWORD_BCRYPT),
]);

login(["email" => $_POST["email"]]);

header('location: /');
exit;
?>