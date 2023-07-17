<?php

    use Core\App;
    use Core\Container;
    use Core\Database;
    use Core\PaymongoAPI;
    use Core\Email\EmailVerification;

    $container = new Container();

    $container->bind('Core\Database', function () {
        $config = require base_path('config.php');

        return new Database($config['database'], $config["user"], $config["password"]);
    });

    $container->bind('Core\PaymongoAPI', function () {
        $config = require base_path('config.php');

        return new PaymongoAPI($config);
    });

    $container->bind('Core\Email\EmailVerification', function () {
        $config = require base_path('emailconfig.php');

        return new EmailVerification($config);
    });

    App::setContainer($container);

?>