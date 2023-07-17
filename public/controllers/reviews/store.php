<?php

use Core\App;
use Core\Database;

$title = "Add Review | Gym Builder Equipments";

$db = App::resolve(Database::class);

// no need validation

$user = $db->query('select user_id from users where email = ? ', [$_SESSION["user"]["email"]] )->findOrFail();

$db->query("INSERT INTO reviews(order_item_id, rating, comment, user_id) VALUES(?, ?, ?, ?)", [
    $_POST["order_item_id"],
    $_POST["rating"],
    $_POST["comment"],
    $user["user_id"],
]);

header("location: /profile/orders");
exit;
?>