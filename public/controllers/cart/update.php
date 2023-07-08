<?php
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);


if (intval($_POST["quantity"]) > 0) {
    $db->query("UPDATE cart SET quantity = ? where cart_id = ?", [$_POST["quantity"], $_POST["cart_id"]]);
} else {
    $db->query("DELETE from cart where cart_id = ?", [$_POST["cart_id"]]);
}
header("Location: /cart");
exit();
?>