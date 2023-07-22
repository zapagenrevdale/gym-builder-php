<?php

    use Core\Database;
    use Core\App;

    $title = "Settings | Admin Gym Builder";

    $db = App::resolve(Database::class);

    $shipping_fee = $db->query('select * from defaults where key_name = "shipping_fee"')->find();
    $installation_fee = $db->query('select * from defaults where key_name = "installation_fee"')->find();

    view("admin/settings/index.php", [ 
        "title" => $title,
        "shipping_fee" => $shipping_fee["value"],
        "installation_fee" => $installation_fee["value"],
    ]);

?>