<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    
    $operation = [
        "edit" => "controllers/micro/nano/admin.products.edit.php",
        "create" => "controllers/micro/nano/admin.products.create.php",
        "delete" => "controllers/micro/nano/admin.products.delete.php",
    ];
    
    require $operation[$_POST["operation"]];
}

if(isset($_GET["edit"])){
    $edit_product = $db->query('select * from products where product_id = ?', [$_GET["edit"]])->findOrFail();
}else {
    $products = $db->query('select * from products')->get();
}


?>