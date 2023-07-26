<?php

$errors = [];
$success = [];

    view("reset/create.php",[
        'title' => 'Reset Password | Gym Builder Equipments',
        'errors' => $errors,
        'success' => $success,
    ]);
?>