<?php
    view("partials/head.php", [
        'title' => $title,
    ]);

    view("partials/header.php");
?>

<div class="flex flex-col justify-center items-center">
    <?php view("components/home/hero.php") ?>
    <?php view("components/home/categories.php") ?>
    <?php view("components/home/tutorials.php") ?>
</div>

<?php view("partials/footer.php"); ?>