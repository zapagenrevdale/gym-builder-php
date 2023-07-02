<?php require "views/partials/head.php" ?>
<?php require "views/partials/admin.header.php" ?>


<div class="container flex flex-col justify-center items-center p-20">
    <div class="flex flex-col xl:flex-row rounded-lg shadow-xl overflow-hidden">
        <?php require "views/components/admin/sidebar.php" ?>
        <?php require $view ?>
    </div>
</div>

<script src="/public/js/admin.js">
</script>
<?php require "views/partials/footer.php" ?>