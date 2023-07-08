<?php

use Core\App;
use Core\Validator;
use Core\Database;

$title = "Create Product | Admin Gym Builder";

$db = App::resolve(Database::class);
$errors = [];

if (! Validator::string($_POST['name'], 1, 255)) {
    $errors['name'] = 'Please enter a valid name (1 - 255 characters)';
}

if (! Validator::string($_POST['description'], 1, 1000)) {
    $errors['description'] = 'Please enter a valid description (1 - 1000 characters)';
}

if (! Validator::price($_POST['price'])) {
    $errors['price'] = 'Please enter a valid price.';
}

if (! Validator::image($_FILES['productImage'])) {
    $errors['productImage'] = 'Please provide a valid image.';
}

if (! Validator::item($_POST['item'])) {
    $errors['item'] = 'Please provide a valid item number.';
}

if (! empty($errors)) {
    return view("admin/products/create.php", [
        'title' => $title,
        'errors' => $errors
    ]);
}

$uniqueName = uniqid() . '_' . $_FILES['productImage']['name'];
$uploadFile = "images/uploads/" . $uniqueName;

if (move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadFile)) {
    $db->query('INSERT INTO products(name, description, price, image_link, item) VALUES(?, ?, ?, ?, ?)', [
        $_POST['name'],
        $_POST['description'],
        $_POST['price'],
        $uploadFile? "/{$uploadFile}": null,
        $_POST['item']
    ]);  
}else{
    abort();
}

header('location: /admin/products');
exit;
?>