<?php

use Core\App;
use Core\Validator;
use Core\Database;

$title = "Login User | Gym Builder Equipment";

$db = App::resolve(Database::class);
$errors = [];

if (! Validator::email($_POST['email'])) {
    $errors['email'] = 'Please enter a valid email';
}

if(! Validator::string($_POST['password'])) {
    $errors['password'] = 'Please enter a valid password';
}

if(! empty($errors)){
    return view("login.view.php", [
        "title" => $title,
        "errors" => $errors
    ]);
}

$user = $db->query('select * from users where email = ?', [$_POST['email']])->find();

if ($user) {
    if (password_verify($_POST["password"], $user['password'])) {
       

        if($user["admin"] === 1){
            adminLogin([
                'email' => $_POST["email"]
            ]);
            header('location: /admin/products');
        }else {
            login([
                'email' => $_POST["email"]
            ]);
            header('location: /');
        }

        
        exit();
    }
}

return view('login.view.php', [
    "title" => $title,
    'errors' => [
        'email' => 'No matching account found for that email address and password.'
    ]
]);


?>