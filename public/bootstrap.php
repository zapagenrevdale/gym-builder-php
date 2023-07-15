<?php

    use Core\App;
    use Core\Container;
    use Core\Database;
    use Core\PaymongoAPI;

    $container = new Container();

    $container->bind('Core\Database', function () {
        $config = require base_path('config.php');

        return new Database($config['database'], $config["user"], $config["password"]);
    });

    $container->bind('Core\PaymongoAPI', function () {
        $config = require base_path('config.php');

        return new PaymongoAPI($config);
    });

    App::setContainer($container);

?>