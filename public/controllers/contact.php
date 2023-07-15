<?php
    use Core\Database;
    use Core\App;
    $db = App::resolve(Database::class);

    view("contact.view.php", [
        'title' => 'Contact Us | Gym Builder Equipments',
    ]);
?>