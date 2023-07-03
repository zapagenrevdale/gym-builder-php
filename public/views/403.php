<?php
    view("partials/head.php", [
        'title' => "PAGE NOT FOUND | GYM BUILDER EQUIPMENTS",
    ]);
    view("partials/header.php");
?>

<div class="flex flex-col justify-center items-center h-screen">
        <h1 class="text-5xl font-grotesk mb-12">
            ERROR 403
        </h1>
        <h1 class="text-4xl font-grotesk font-light">
             YOU ARE NOT AUTHORIZED TO VIEW THIS PAGE
        </h1>
</div>

<?php view("partials/footer.php"); ?>