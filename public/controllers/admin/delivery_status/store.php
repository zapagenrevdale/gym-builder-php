<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);

$length = count($_POST["order_id"]);

for ($i = 0; $i < $length; $i++) {
    if($_POST["default_long_status"][$i] != $_POST["long_status"][$i]){
        $db->query("INSERT INTO delivery_status(order_id, status)  VALUES(?, ?) ", [
            $_POST["order_id"][$i],
            $_POST["long_status"][$i],
        ]);
    }
}

header('location: /admin/dashboard');
exit;
?>