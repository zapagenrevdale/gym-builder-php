<?php
    // return [
    //     '/' => 'controllers/index.php',
    //     '/login/' => 'controllers/login.php',
    //     '/register/' => 'controllers/register.php',

    //     // admin
    //     '/admin/products/' => 'controllers/admin.php',

    // ];
    
    $router->get('/', 'controllers/index.php');
    $router->get('/login', 'controllers/login.php');
    $router->get('/register', 'controllers/register.php');

    // routes for PRODUCTS CRUD
    $router->get('/admin/products', 'controllers/admin/products/index.php');
    $router->post('/admin/products', 'controllers/admin/products/store.php');
    $router->patch('/admin/products', 'controllers/admin/products/update.php');
    $router->delete('/admin/products', 'controllers/admin/products/destroy.php');

    $router->get('/admin/products/create', 'controllers/admin/products/create.php');
    $router->get('/admin/products/edit', 'controllers/admin/products/edit.php');

    // routes for TUTORIALS CRUD

    $router->get('/admin/tutorials', 'controllers/admin/tutorials/index.php');
    $router->post('/admin/tutorials', 'controllers/admin/tutorials/store.php');
    $router->patch('/admin/tutorials', 'controllers/admin/tutorials/update.php');
    $router->delete('/admin/tutorials', 'controllers/admin/tutorials/destroy.php');

    $router->get('/admin/tutorials/create', 'controllers/admin/tutorials/create.php');
    $router->get('/admin/tutorials/edit', 'controllers/admin/tutorials/edit.php');


?>