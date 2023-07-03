<?php

    use Core\App;
    use Core\Validator;
    use Core\Database;
    
    $title = "Edit Product | Admin Gym Builder";

    $db = App::resolve(Database::class);
    $errors = [];
    $edit_product = $db->query('select * from products where product_id = ?', [$_POST['product_id']])->findOrFail();

    if (! Validator::string($_POST['name'], 1, 255)) {
        $errors['name'] = 'Please enter a valid name (1 - 255 characters)';
    }

    if (! Validator::string($_POST['description'], 1, 1000)) {
        $errors['description'] = 'Please enter a valid description (1 - 1000 characters)';
    }

    if (! Validator::price($_POST['price'])) {
        $errors['price'] = 'Please enter a valid price.';
    }

    if(strlen($_FILES['productImage']["name"]) === 0 || strlen($_FILES['productImage']["full_path"]) === 0){
        $uploadFile  = $edit_product["image_link"];
    }else{
        if (! Validator::image($_FILES['productImage'])) {
            $errors['productImage'] = 'Please provide a valid image.';
        }else{
            $uniqueName = uniqid() . '_' . $_FILES['productImage']['name'];
            $uploadFile = "images/uploads/" . $uniqueName;
            move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadFile);
            $uploadFile  = "/{$uploadFile}";
        }
        
    }

    
    if (! empty($errors)) {
        return view("admin/products/edit.php", [
            'title' => $title,
            'errors' => $errors,
            'edit_product' => $edit_product,
        ]);
    }


    $db->query('UPDATE products SET name = ?, description = ?, price = ?, image_link = ? WHERE product_id = ?', [
        $_POST['name'],
        $_POST['description'],
        $_POST['price'],
        $uploadFile,
        $_POST["product_id"],
    ]); 

    header('location: /admin/products');
    exit;
?>