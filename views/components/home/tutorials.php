<?php view("components/home/subcomponent/tutorialCard.php"); ?>

<div class="container flex flex-col items-center font-medium mt-20">
    <h4 class="uppercase underline underline-offset-8 mb-4 text-sm">
        EQUIPMENT LIBRARY
    </h4>
    <h2 class="font-bold mb-14">Latest Tutorials</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 ">
        <?php
        $tutorial = [
            "title" => "Dumbbell Workout Guide: Essential Exercises for Building Strength and Muscle",
            "image" => "images/cat1.webp",
            "date" => "January 26, 2023",
        ];
        renderTutorialCard($tutorial);

        $tutorial = [
            "title" => "Kettlebell Training Tutorial: Mastering Form and Technique for Full-Body Workouts",
            "image" => "images/cat1.webp",
            "date" => "January 26, 2023",
        ];
        renderTutorialCard($tutorial);

        $tutorial = [
            "title" => "Dumbbell Workout Guide: Essential Exercises for Building Strength and Muscle",
            "image" => "images/cat1.webp",
            "date" => "January 26, 2023",
        ];
        renderTutorialCard($tutorial);

        $tutorial = [
            "title" => "Kettlebell Training Tutorial: Mastering Form and Technique for Full-Body Workouts",
            "image" => "images/cat1.webp",
            "date" => "January 26, 2023",
        ];
        renderTutorialCard($tutorial);

        $tutorial = [
            "title" => "Dumbbell Workout Guide: Essential Exercises for Building Strength and Muscle",
            "image" => "images/cat1.webp",
            "date" => "January 26, 2023",
        ];

        renderTutorialCard($tutorial);
        ?>

    </div>
</div>