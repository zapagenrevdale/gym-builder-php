<?php
    // return [
    //     '/' => 'controllers/index.php',
    //     '/login/' => 'controllers/login.php',
    //     '/register/' => 'controllers/register.php',

    //     // admin
    //     '/admin/products/' => 'controllers/admin.php',

    // ];
    
    $router->get('/', 'controllers/index.php');

    //LOGIN 
    $router->get('/login', 'controllers/login/create.php')->only("guest");
    $router->post('/login', 'controllers/login/store.php')->only("guest");

    //REGISTER
    $router->get('/register', 'controllers/register/create.php')->only("guest");
    $router->post('/register', 'controllers/register/store.php')->only("guest");

    // routes for PRODUCTS CRUD
    $router->get('/admin/products', 'controllers/admin/products/index.php')->only("admin");;
    $router->post('/admin/products', 'controllers/admin/products/store.php')->only("admin");;
    $router->patch('/admin/products', 'controllers/admin/products/update.php')->only("admin");;
    $router->delete('/admin/products', 'controllers/admin/products/destroy.php')->only("admin");;

    $router->get('/admin/products/create', 'controllers/admin/products/create.php')->only("admin");;
    $router->get('/admin/products/edit', 'controllers/admin/products/edit.php')->only("admin");;

    // routes for TUTORIALS CRUD

    $router->get('/admin/tutorials', 'controllers/admin/tutorials/index.php')->only("admin");
    $router->post('/admin/tutorials', 'controllers/admin/tutorials/store.php')->only("admin");
    $router->patch('/admin/tutorials', 'controllers/admin/tutorials/update.php')->only("admin");
    $router->delete('/admin/tutorials', 'controllers/admin/tutorials/destroy.php')->only("admin");

    $router->get('/admin/tutorials/create', 'controllers/admin/tutorials/create.php')->only("admin");
    $router->get('/admin/tutorials/edit', 'controllers/admin/tutorials/edit.php')->only("admin");

    // routes for USERS CRUD

    $router->get('/admin/users', 'controllers/admin/users/index.php')->only("admin");;
    $router->post('/admin/users', 'controllers/admin/users/store.php')->only("admin");;
    $router->patch('/admin/users', 'controllers/admin/users/update.php')->only("admin");;
    $router->delete('/admin/users', 'controllers/admin/users/destroy.php')->only("admin");;

    $router->get('/admin/users/create', 'controllers/admin/users/create.php')->only("admin");;
    $router->get('/admin/users/edit', 'controllers/admin/users/edit.php')->only("admin");;


?>