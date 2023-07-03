<?php

    use Core\Database;
    use Core\App;

    $title = "Tutorials | Admin Gym Builder";

    $db = App::resolve(Database::class);

    $tutorials = $db->query('select * from tutorials')->get();
    view("admin/tutorials/index.php", [ 
        "title" => $title,
        "tutorials" => $tutorials, 
    ]);

?>