<?php

use Core\App;
use Core\Validator;
use Core\Database;

$title = "Create Tutorial | Admin Gym Builder";

$db = App::resolve(Database::class);
$errors = [];

if (! Validator::string($_POST['title'], 1, 255)) {
    $errors['title'] = 'Please enter a valid title (1 - 255 characters)';
}

if (! Validator::string($_POST['content'], 1, 1000)) {
    $errors['content'] = 'Please enter a valid content (1 - 1000 characters)';
}

if (empty($_POST['product_id'])) {
    $errors['product_id'] = 'Please enter a valid product.';
}

if (! Validator::video($_FILES['tutorialVideo'])) {
    $errors['tutorialVideo'] = 'Please provide a valid video.';
}

if (! empty($errors)) {
    view("admin/tutorials/create.php", [
        'title' => $title,
        'errors' => $errors
    ]);
}

$uniqueName = uniqid() . '_' . $_FILES['tutorialVideo']['name'];
$uploadFile = "images/uploads/" . $uniqueName;

if (move_uploaded_file($_FILES['tutorialVideo']['tmp_name'], $uploadFile)) {
    $db->query('INSERT INTO tutorials(title, product_id, content, video_link) VALUES(?, ?, ?, ?)', [
        $_POST['title'],
        $_POST['product_id'],
        $_POST['content'],
        $uploadFile? "/{$uploadFile}": null,
    ]);  
}else{
    abort();
}

header('location: /admin/tutorials');
exit;
?>