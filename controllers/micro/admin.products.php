<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    if (strlen($_POST['name']) === 0) {
        $errors['name'] = 'Product name is required';
    }

    if(strlen($_POST['name']) > 40){
        $errors['name'] = 'Name too long';
    }

    if (strlen($_POST['description']) === 0) {
        $errors['description'] = 'Product description is required';
    }

    if(strlen($_POST['description']) > 500){
        $errors['description'] = 'Description too long';
    }

    if(!is_numeric($_POST['price']) || floatval($_POST['price']) < 0){
        $errors['price'] = 'Invalid price';
    }
    
    $uploadDir = '../../upload';
    $uploadFile = $uploadDir . basename($_FILES['productImage']['name']);
    $allowedFormats = ['jpg', 'jpeg', 'png', 'gif', "image/jpg", "image/jpeg", "image/png", "image/gif"];
  
    // Check if the file is an actual image
    $imageInfo = getimagesize($_FILES['productImage']['tmp_name']);

    if (!$imageInfo || !in_array($imageInfo['mime'], $allowedFormats)) {
        $errors['productImage'] = "Error: Invalid file format. Only JPG, JPEG, PNG, and GIF files are allowed.";
    }else {
        $uniqueName = uniqid() . '_' . $_FILES['productImage']['name'];
        $uploadFile = $uploadDir . $uniqueName;
    
        if (!move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadFile)) {
            $errors['productImage'] = "Error: There was an error uploading the file.";
        } 
    }

    if (empty($errors)) {
        $db->query('INSERT INTO products(name, description, price, image_link) VALUES(?, ?, ?, ?)', [
            $_POST['name'],
            $_POST['description'],
            $_POST['price'],
            $uploadFile,
        ]);
    }else {
        dd($errors);
    }
}

?>