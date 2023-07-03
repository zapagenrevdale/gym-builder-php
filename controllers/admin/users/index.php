<?php

    use Core\Database;
    use Core\App;

    $title = "Users | Admin Gym Builder";

    $db = App::resolve(Database::class);

    $users = $db->query('select * from users')->get();
    view("admin/users/index.php", [ 
        "title" => $title,
        "users" => $users, 
    ]);

?>