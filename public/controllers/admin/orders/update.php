<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);

$length = count($_POST["order_id"]);


for ($i = 0; $i < $length; $i++) {
    $db->query("UPDATE orders SET status = ?, delivery_status = ? where order_id = ?", [
        $_POST["payment_status"][$i], 
        $_POST["delivery_status"][$i],
        $_POST["order_id"][$i],
    ]);
}

header('location: /admin/orders');
exit;
?>