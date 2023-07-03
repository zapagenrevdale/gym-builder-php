<?php

use Core\App;
use Core\Validator;
use Core\Database;

$title = "Update Tutorial | Admin Gym Builder";

$db = App::resolve(Database::class);
$edit_tutorial = $db->query('select * from tutorials where tutorial_id = ?', [$_POST["tutorial_id"]])->findOrFail();
$errors = [];

if (! Validator::string($_POST['title'], 1, 255)) {
    $errors['name'] = 'Please enter a valid title (1 - 255 characters)';
}

if (! Validator::string($_POST['content'], 1, 1000)) {
    $errors['content'] = 'Please enter a valid content (1 - 1000 characters)';
}

if (empty($_POST['product_id'])) {
    $errors['product_id'] = 'Please enter a valid product.';
}

if (! Validator::validateFilePresence($_FILES['tutorialVideo'])) {
    $uploadFile = $edit_tutorial["video_link"];
}else{
    if(! Validator::video($_FILES['tutorialVideo'])){
        $errors['tutorialVideo'] = 'Please enter a valid video.'; 
    }else {
        $uniqueName = uniqid() . '_' . $_FILES['tutorialVideo']['name'];
        $uploadFile = "images/uploads/" . $uniqueName;
        move_uploaded_file($_FILES['tutorialVideo']['tmp_name'], $uploadFile);
        $uploadFile = "/" .  $uploadFile;
    }
}

if (! empty($errors)) {
    return view("admin/tutorials/create.php", [
        'title' => $title,
        'errors' => $errors
    ]);
}


$db->query('UPDATE tutorials SET title = ?, product_id = ?, content = ?, video_link = ? where tutorial_id = ?', [
    $_POST['title'],
    $_POST['product_id'],
    $_POST['content'],
    $uploadFile,
    $_POST["tutorial_id"]
]);
header('location: /admin/tutorials');
exit;
?>