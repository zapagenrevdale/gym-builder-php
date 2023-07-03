<?php view("components/home/subcomponent/categoriesCard.php"); ?>

<div class="container flex flex-col items-center font-medium mt-20">
    <h4 class="uppercase underline underline-offset-8 mb-4 text-sm text-center">
        SHOP BY CATEGORIES
    </h4>
    <h2 class="font-bold mb-14 text-center">Equipment Types</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-7 items-center">
        <?php
        $jsonString = file_get_contents('../contents/contents.json');
        $data = json_decode($jsonString, true);
        $categories = $data["data"];
        foreach ($categories as $category) {
            renderCategoriesCard($category);
        }
        ?>
    </div>
</div>