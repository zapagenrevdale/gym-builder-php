<?php

use Core\App;
use Core\Validator;
use Core\Database;

$title = "My Profile | Admin Gym Builder";

$db = App::resolve(Database::class);
$edit_user = $db->query('select * from users where user_id = ?', [$_POST["user_id"]])->findOrFail();


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

$user = $db->query('select * from users where email = ? and user_id != ?', [$_POST['email'], $_POST['user_id']])->find();

if($user){
    $errors['email'] = 'Email already exists!';
}

//check if password needs update
if(strlen(trim($_POST['password'])) === 0){
    $no_password = true;
}else{
    if(! Validator::password($_POST['password'])) {
        $errors['password'] = 'Password should be at least 6 characters and contains one lower and uppercase character';
    }
}

if(! empty($errors)){
    return view("profile/index.php", [
        "title" => $title,
        "errors" => $errors,
        "user" => $edit_user,
    ]);
}

$verified = 1;
if($edit_user["email"] !== $_POST['email']){
    $verified = 0;
}

if($no_password){
    $db->query('UPDATE users SET first_name = ?, last_name = ?, email = ?, verified = ? WHERE user_id = ?', [
        $_POST["first_name"], 
        $_POST["last_name"], 
        $_POST["email"], 
        $verified,
        $_POST["user_id"],
    ]);
}else {
    $db->query('UPDATE users SET first_name = ?, last_name = ?, email = ?, password = ?, verified = ? WHERE user_id = ?', [
        $_POST["first_name"], 
        $_POST["last_name"], 
        $_POST["email"], 
        password_hash($_POST["password"], PASSWORD_BCRYPT),
        $verified,
        $_POST["user_id"],
    ]);
}

$_SESSION["user"] = ["email" => $_POST["email"]];

header('location: /profile');
exit;
?>