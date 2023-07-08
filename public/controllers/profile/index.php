<?php

    use Core\Database;
    use Core\App;


    $db = App::resolve(Database::class);
    
    $user = $db->query('select * from users where email = ? ', [$_SESSION["user"]["email"]] )->findOrFail();
    $title = " My Account | Admin Gym Builder";
    view("profile/index.php", [
        "title" => $title,
        "user" =>  $user,
    ]);
?>