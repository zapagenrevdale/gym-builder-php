<?php 
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("partials/header.php");
?>

<form method="POST" action="/login" class="container flex flex-col justify-center max-w-[600px] gap-8 w-full py-20">
    <div class="flex flex-col items-center gap-6 justify-center">
        <h1 class="text-5xl font-semibold text-center">Login</h1>
        <div class="flex items-center gap-2 justify-center mb-4">
            <a href="">Home</a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4 text-neutral-800">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>

            <a href="">Account</a>
        </div>
    </div>
    <div class="flex flex-col w-full gap-2">
        <label for="email" class="font-medium">Email</label>
        <input  type="email" id="email" name="email" class="h-14 border rounded-md focus:border px-4 w-full"
            value="<?= $_POST['email'] ?? "" ?>" />
        <?= isset($errors["email"]) ? '<p class="text-red-700 text-sm">'. $errors["email"] .'</p>' : '' ?>
    </div>
    <div class="flex flex-col w-full">
        <label for="password" class="font-medium">Password</label>
        <input  type="password" id="password" name="password"
            class="h-14 border rounded-md focus:border px-4 w-full">
        <?= isset($errors["password"]) ? '<p class="text-red-700 text-sm">'. $errors["password"] .'</p>' : '' ?>
    </div>

    <a href="#" class="font-light">
        Forgot your password?
    </a>

    <input
        class="font-semibold text-center primary-button hover:hover-button-black primary-button-black flex items-center justify-center rounded-md font-grotesk cursor-pointer"
        type="Submit"
        value="Sign in" />

    <div class="w-full flex items-center justify-center relative h-14">
        <div class="w-full h-1 border-b"> </div>
        <div
            class="h-14 w-14 text-sm border rounded-full absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-white flex items-center justify-center">
            OR
        </div>
    </div>

    <a href="/register"
        class="primary-button hover:hover-button-white primary-button-white flex items-center justify-center rounded-md font-grotesk border-2 border-neutral-800 ">
        <h6 class="font-semibold">Create Account</h6>
    </a>
</form>

<?php view("partials/footer.php"); ?>