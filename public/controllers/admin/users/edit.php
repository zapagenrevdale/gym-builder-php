<?php

    use Core\Database;
    use Core\App;

    if(!isset($_GET["user_id"])){
        abort(404);
    }

    $db = App::resolve(Database::class);

    $title = "Edit User | Admin Gym Builder";
    $edit_user = $db->query('select * from users where user_id = ?', [$_GET["user_id"]])->findOrFail();
    
    view("admin/users/edit.php", [
        "title" => $title,
        "edit_user" =>  $edit_user,
    ]);

?>