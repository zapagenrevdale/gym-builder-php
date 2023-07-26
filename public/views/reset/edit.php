<?php
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("partials/header.php");
?>

<div class="flex flex-col h-screen items-center text-center p-5 w-full ">
    <div class="flex flex-col items-center gap-6 justify-center">
        <h1 class="text-5xl font-semibold text-center">Reset Password</h1>
        <div class="flex items-center gap-2 justify-center mb-4">
            <a href="">Home</a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4 text-neutral-800">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>

            <a href="">Reset Password</a>
        </div>
    </div>
    <form method="POST" action="/reset-password"
        class="container flex flex-col items-center max-w-[600px] gap-8 w-full py-20">
        <input type="text" name="_method" hidden value="patch" />
        <div class="grid grid-cols-12 w-full gap-2 items-center">
            <label for="email" class="font-medium  col-span-2 text-start">Email</label>
            <input type="email" id="email" name="email" class="hidden" value="<?= $email ?? "" ?>" />
            <input type="email" id="email" name="email" disabled
                class="h-10 text-start border rounded-md focus:border px-4 w-full col-span-10"
                value="<?= $email ?? "" ?>" />
        </div>
        <div class="grid grid-cols-12 w-full gap-2 items-center">
            <label for="password" class="font-medium col-span-2 text-start">Password</label>
            <div class="relative w-full col-span-10">
                <input type="password" id="password" name="password" required pattern="^(?=.*[a-z])(?=.*[A-Z]).{6,}$"
                    class="h-10 border rounded-md focus:border px-4 w-full" data-toggle="password">
                <button id="togglePassword" type="button"
                    class="absolute top-1 right-2 h-8 w-10 p-2 focus:outline-none">
                    <!-- Add an SVG icon or font icon for the button -->
                    <!-- Below is an example of an SVG icon for an eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 text-gray-600"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" id="eyeIcon">
                        <path
                            d="M12 2C7 2 2.63 5.1 1 12c1.63 6.9 6 10 11 10s9.37-3.1 11-10c-1.63-6.9-6-10-11-10zm0 16c-3.33 0-6-2.67-6-6s2.67-6 6-6 6 2.67 6 6-2.67 6-6 6zm0-4c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0-2c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z" />
                    </svg>
                </button>
                <p class="text-neutral-600 text-sm text-justify absolute -bottom-12">*<b>Note</b>: Password must be 6 characters
                    long and contains one Uppercase and one Digit
                </p>
            </div>
        </div>



        <div class="flex justify-end w-full pt-6">
            <input
                class="font-semibold text-center primary-button hover:hover-button-black primary-button-black flex items-center justify-center rounded-md font-grotesk cursor-pointer"
                type="Submit" value="Reset Password" />
        </div>

        <?= isset($errors["email"]) ? '<p class="text-red-700 text-sm font-bold">'. $errors["email"] .'</p>' : '' ?>
        <?= isset($success["email"]) ? '<p class="text-green-700 text-sm font-bold">'. $success["email"] .'</p>' : '' ?>
    </form>

</div>
<script>
const togglePassword = document.getElementById("togglePassword");
const passwordInput = document.getElementById("password");
const eyeIcon = document.getElementById("eyeIcon");

togglePassword.addEventListener("click", function() {
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("text-gray-600");
        eyeIcon.classList.add("text-blue-500"); // Change the color when the password is visible
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("text-blue-500");
        eyeIcon.classList.add("text-gray-600"); // Change the color back when the password is hidden
    }
});
</script>
<?php view("partials/footer.php"); ?>