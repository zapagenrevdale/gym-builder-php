<?php

    use Core\Database;
    use Core\App;

    $db = App::resolve(Database::class);

    $title = "Delete User | Admin Gym Builder";
    $user = $db->query('select * from users where user_id = ?', [$_POST["user_id"]])->findOrFail();

    $db->query("DELETE from users where user_id = ?", [$user["user_id"]]);
    header("Location: /admin/users");
    exit;
?>