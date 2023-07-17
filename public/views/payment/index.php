<?php
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("partials/header.php");
?>

<div class="flex flex-col h-screen items-center">
    <div class="flex flex-col items-center gap-6 justify-center py-20">
        <h1 class="text-5xl font-semibold text-center">Payment Overview</h1>
        <div class="flex items-center gap-2 justify-center mb-4">
            <a href="">Home</a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4 text-neutral-800">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>

            <a href="">Payment Status</a>
        </div>
    </div>

    <h3 class="text-3xl font-grotesk font-semibold text-center mt-32"><?= $status ?></h3>
    <div class="flex gap-4">
        <a type="submit" href="/"
            class="cursor-pointer mt-3 primary-button text-center  primary-button-black hover:bg-neutral-800/90 flex justify-center items-center gap-4 rounded-md font-semibold">
            Back to Home
        </a>
        <a type="submit" href="/profile/orders"
            class="cursor-pointer mt-3 primary-button text-center  primary-button-black hover:bg-neutral-800/90 flex justify-center items-center gap-4 rounded-md font-semibold">
            Go to orders
        </a>
    </div>
</div>

<?php view("partials/footer.php"); ?>