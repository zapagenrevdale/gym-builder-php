<?php
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("partials/header.php");
?>

<div class="flex flex-col justify-center items-center">
    <?php view("components/home/hero.php") ?>
    <?php view("components/home/products.php", ["products" => $products]) ?>
    <!-- <?php view("components/home/tutorials.php") ?> -->
</div>
<div class="h-10">

</div>

<?php view("partials/footer.php"); ?>