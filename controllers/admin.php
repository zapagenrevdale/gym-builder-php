<?php
    $title = "Admin | Gym Builder Equipments";

    $admin_view = [
        "/admin/products/" => "views/components/admin/products.php"
    ];
    
    global $uri;

    $view = $admin_view[$uri];
    $config = require('config.php');
    $db = new Database($config['database']);

    if($uri === "/admin/products/"){
        require "controllers/micro/admin.products.php";
    }

   

    
    require "views/admin.view.php";
?>