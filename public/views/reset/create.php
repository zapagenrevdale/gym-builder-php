<?php
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("partials/header.php");
?>

<div class="flex flex-col h-screen items-center text-center p-5 w-full ">
    <div class="flex flex-col items-center gap-6 justify-center">
        <h1 class="text-5xl font-semibold text-center">Forgot Password</h1>
        <div class="flex items-center gap-2 justify-center mb-4">
            <a href="">Home</a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4 text-neutral-800">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>

            <a href="">Forgotten Password</a>
        </div>
    </div>
    <form method="POST" action="/forgot-password"
        class="container flex flex-col items-center max-w-[600px] gap-8 w-full py-20">
        <div class="flex w-full gap-4 items-center">
            <label for="email" class="font-medium">Email</label>
            <input type="email" id="email" name="email" class="h-10 border rounded-md focus:border px-4 w-full"
                value="<?= $_POST['email'] ?? "" ?>" />
        </div>
        <div class="flex justify-end w-full">
            <button id="submitButton"
                class="font-semibold text-center primary-button hover:hover-button-black primary-button-black flex items-center justify-center rounded-md font-grotesk cursor-pointer"
                type="submit">
                Reset Password
            </button>
        </div>

        <?= isset($errors["email"]) ? '<p class="text-red-700 text-sm font-bold">'. $errors["email"] .'</p>' : '' ?>
        <?= isset($success["email"]) ? '<p class="text-green-700 text-sm font-bold">'. $success["email"] .'</p>' : '' ?>
    </form>

</div>
<?php view("partials/footer.php"); ?>