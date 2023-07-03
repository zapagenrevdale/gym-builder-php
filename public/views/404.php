<?php
    view("partials/head.php", [
        'title' => "PAGE NOT FOUND | GYM BUILDER EQUIPMENTS",
    ]);

    view("partials/header.php");
?>

<div class="flex flex-col justify-center items-center h-screen">
        <h1 class="text-5xl font-grotesk underline underline-offset-8 mb-12">
            ERROR 404
        </h1>
        <h1 class="text-4xl font-grotesk font-light">
             PAGE NOT FOUND
        </h1>
</div>

<?php view("partials/footer.php"); ?>