<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$db->query("UPDATE users SET password = ? WHERE email = ?", [
    password_hash($_POST["password"], PASSWORD_BCRYPT),
    $_POST["email"]
]);


$db->query("DELETE FROM password_reset_tokens WHERE email = ?", [$_POST["email"]]);

header("location: /login");
exit();
?>