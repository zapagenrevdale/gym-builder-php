<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);

$db->query("UPDATE defaults SET value = ? WHERE key_name = 'shipping_fee'",[
    $_POST["shipping_fee"],
]);


$db->query("UPDATE defaults SET value = ? WHERE key_name = 'installation_fee'",[
    $_POST["installation_fee"],
]);


header('location: /admin/settings');
exit;
?>