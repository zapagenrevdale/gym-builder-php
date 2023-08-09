<?php
    use Core\Database;
    use Core\App;
    $db = App::resolve(Database::class);

    view("faq.view.php", [
        'title' => 'FAQs | Gym Builder Equipments',
    ]);
?>