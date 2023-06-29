<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./public/css/global.css" rel="stylesheet">
</head>

<body class="min-h-[30000000000px] flex flex-col items-center">
    <?php
    include "./components/header.php";
    ?>

    <div className="flex flex-col justify-center items-center">
        <?php
        include "./components/home/hero.php";
        include "./components/home/categories.php";
        include "./components/home/tutorials.php";
        ?>
    </div>



    <script src="./public/js/home.js"></script>
</body>

</html>