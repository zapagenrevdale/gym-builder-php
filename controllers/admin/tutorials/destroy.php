<?php

    use Core\Database;
    use Core\App;

    $db = App::resolve(Database::class);

    $title = "Delete Tutorial | Admin Gym Builder";
    $tutorial = $db->query('select * from tutorials where tutorial_id = ?', [$_POST["tutorial_id"]])->findOrFail();

    $db->query("DELETE from tutorials where tutorial_id = ?", [$tutorial["tutorial_id"]]);
    header("Location: /admin/tutorials");
    exit;
?>