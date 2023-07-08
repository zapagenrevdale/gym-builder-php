<?php

    use Core\Database;
    use Core\App;


    $db = App::resolve(Database::class);
    
    $user = $db->query('select * from users where email = ? ', [$_SESSION["user"]["email"]])->findOrFail();
    $address = $db->query('select * from addresses where user_id = ? ORDER BY address_id DESC', [$user["user_id"]] )->find();
    
    $title = " My Address | Admin Gym Builder";
    view("profile/address/index.php", [
        "title" => $title,
        "address" =>  $address,
        "user" =>  $user,
    ]);
?>