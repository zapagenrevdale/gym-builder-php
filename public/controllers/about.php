<?php
    use Core\Database;
    use Core\App;
    $db = App::resolve(Database::class);

    view("about.view.php", [
        'title' => 'About Us | Gym Builder Equipments',
    ]);
?>