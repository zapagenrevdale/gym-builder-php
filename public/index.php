<?php

    ini_set('post_max_size', '80M');
    ini_set('upload_max_filesize', '80M');
    session_start();
    date_default_timezone_set('Asia/Manila');
    const BASE_PATH = __DIR__.'/';

    require BASE_PATH.'Core/functions.php';

    spl_autoload_register(function ($class) {
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

        require base_path("{$class}.php");
    });

    require base_path('bootstrap.php');

    $router = new \Core\Router();
    $routes = require base_path('routes.php');
    
    require base_path('vendor/autoload.php');

    require base_path('Model/Email/Entity.php');
    require base_path('Model/Email/Content.php');
    require base_path('Core/Email/emailverification.php');
    require base_path('Core/Email/mailer.php');

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

    $router->route($uri, $method);

?>