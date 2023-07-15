<?php
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("partials/header.php");
?>

<div class="container flex flex-col justify-center items-center scroll-behavior-smooth">

    <div class="p-10 flex flex-col gap-6">

        <div class="flex flex-col items-center gap-4">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3250.560125077369!2d120.95738726217351!3d14.335276770301943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d445d98c85f1%3A0x5c0268912f4048d5!2sArea%201%2C%20Dasmari%C3%B1as%2C%20Cavite!5e0!3m2!1sen!2sph!4v1689146566696!5m2!1sen!2sph"
                width="600" height="450" style="border:0;" allowfullscreen="true" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" class="rounded-md shadow-md">
            </iframe>
            <address>B73 L13 Brgy. San Esteban Dasmarinas City, Cavite,
                Philippines
            </address>.
        </div>

        <div class="max-w-5xl">

            <h5 class="text-xl font-grotesk text-justify font-light">
                <b class="text-2xl font-bold">GYM Builder Equipments</b> specializes in selling heavy-duty gym equipment
                to gym
                owners and fitness
                enthusiasts. Owned by <i class="font-semibold">Mr. Rufino A. Dela Cruz</i>, the company has a Facebook
                page named Gym Builder. Visit
                Gym Builder Equipments on Facebook to explore their range of superior-quality equipment designed to meet
                the demands of rigorous workouts.
            </h5>

            <p class="pt-4">Please visit our Facebook page, <a href="https://www.facebook.com/TheGymBuilder"
                    class="underline underline-offset-4" target="_blank">Gym Builder
                    Equipments</a>.</p>


        </div>
    </div>


</div>

<?php view("partials/footer.php"); ?>