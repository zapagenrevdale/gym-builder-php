<?php

use Core\App;
use Core\Validator;
use Core\Database;

$title = "My Address | Admin Gym Builder";

$db = App::resolve(Database::class);


if (! Validator::string($_POST['address_line1'], 1, 255)) {
    $errors['address_line1'] = 'Please enter a valid value (1 - 255 characters)';
}

if (! Validator::string($_POST['address_line1'], 1, 255)) {
    $errors['address_line'] = 'Please enter a valid value (1 - 255 characters)';
}

if (! Validator::string($_POST['city'], 1, 255)) {
    $errors['city'] = 'Please enter a valid value (1 - 255 characters)';
}

if (! Validator::string($_POST['country'], 1, 255)) {
    $errors['country'] = 'Please enter a valid value (1 - 255 characters)';
}


if (! Validator::string($_POST['postal_code'], 1, 255)) {
    $errors['postal_code'] = 'Please enter a valid value (1 - 255 characters)';
}


if(! empty($errors)){
    return view("profile/address/index.php", [
        "title" => $title,
        "errors" => $errors,
        "address" => $_POST,
    ]);
}


$db->query('INSERT INTO addresses(user_id, address_line1, address_line2, city, country, postal_code) VALUES(?, ?, ?, ?, ?, ?)', [
    $_POST["user_id"], 
    $_POST["address_line1"], 
    $_POST["address_line2"], 
    $_POST["city"], 
    $_POST["country"], 
    $_POST["postal_code"], 
]);

header('location: /profile/address');
exit;
?>