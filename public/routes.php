<?php
    
    $router->get('/', 'controllers/index.php');
    $router->get('/about', 'controllers/about.php');
    $router->get('/contact', 'controllers/contact.php');

    //LOGIN 
    $router->get('/login', 'controllers/login/create.php')->only("guest");
    $router->post('/login', 'controllers/login/store.php')->only("guest");

    //REGISTER
    $router->get('/register', 'controllers/register/create.php')->only("guest");
    $router->post('/register', 'controllers/register/store.php')->only("guest");

    // routes for PRODUCTS CRUD
    //READ
    $router->get('/admin/products', 'controllers/admin/products/index.php')->only("admin");
    //CREATE
    $router->post('/admin/products', 'controllers/admin/products/store.php')->only("admin");
    //UPDATE
    $router->patch('/admin/products', 'controllers/admin/products/update.php')->only("admin");
    //DELETE
    $router->delete('/admin/products', 'controllers/admin/products/destroy.php')->only("admin");

    // provide view
    $router->get('/admin/products/create', 'controllers/admin/products/create.php')->only("admin");
    $router->get('/admin/products/edit', 'controllers/admin/products/edit.php')->only("admin");

    // routes for TUTORIALS CRUD

    $router->get('/admin/tutorials', 'controllers/admin/tutorials/index.php')->only("admin");
    $router->post('/admin/tutorials', 'controllers/admin/tutorials/store.php')->only("admin");
    $router->patch('/admin/tutorials', 'controllers/admin/tutorials/update.php')->only("admin");
    $router->delete('/admin/tutorials', 'controllers/admin/tutorials/destroy.php')->only("admin");

    $router->get('/admin/tutorials/create', 'controllers/admin/tutorials/create.php')->only("admin");
    $router->get('/admin/tutorials/edit', 'controllers/admin/tutorials/edit.php')->only("admin");

    // routes for USERS CRUD
    $router->get('/admin/users', 'controllers/admin/users/index.php')->only("admin");
    $router->post('/admin/users', 'controllers/admin/users/store.php')->only("admin");
    $router->patch('/admin/users', 'controllers/admin/users/update.php')->only("admin");
    $router->delete('/admin/users', 'controllers/admin/users/destroy.php')->only("admin");

    $router->get('/admin/users/create', 'controllers/admin/users/create.php')->only("admin");
    $router->get('/admin/users/edit', 'controllers/admin/users/edit.php')->only("admin");

    // routes for ORDERS CRUD
    $router->get('/admin/orders', 'controllers/admin/orders/index.php')->only("admin");
    $router->patch('/admin/orders', 'controllers/admin/orders/update.php')->only("admin");

    //routes for session
    $router->get('/logout', 'controllers/session/destroy.php')->only("auth");


    //routes for User products
    $router->get('/products/show', 'controllers/products/show.php');

    //routes for Cart
    $router->get('/cart', 'controllers/cart/index.php')->only("auth");
    $router->post('/cart', 'controllers/cart/store.php');
    $router->patch('/cart', 'controllers/cart/update.php')->only("auth");
    $router->delete('/cart', 'controllers/cart/delete.php')->only("auth");

    // profile
    $router->get('/profile', 'controllers/profile/index.php')->only("auth");
    $router->patch('/profile', 'controllers/profile/profile.update.php')->only("auth");

    // address
    $router->get('/profile/address', 'controllers/profile/address/index.php')->only("auth");
    $router->patch('/profile/address', 'controllers/profile/address/update.php')->only("auth");

    //orders
    $router->get('/profile/orders', 'controllers/profile/orders/index.php')->only("auth");
    $router->post('/order', 'controllers/profile/orders/store.php')->only("auth");

    //checkout
    $router->get('/checkout', 'controllers/checkout/index.php')->only("auth");
    $router->post('/checkout', 'controllers/checkout/store.php')->only("auth");


    $router->get('/payment', 'controllers/payment/index.php')->only("auth");


    
    

    
?>