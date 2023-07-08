<?php
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$db->query("DELETE from cart where cart_id = ?", [$_POST["cart_id"]]);

header("Location: /cart");
exit();
?>