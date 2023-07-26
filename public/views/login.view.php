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
        <input type="email" id="email" name="email" class="h-14 border rounded-md focus:border px-4 w-full"
            value="<?= $_POST['email'] ?? "" ?>" />
        <?= isset($errors["email"]) ? '<p class="text-red-700 text-sm">'. $errors["email"] .'</p>' : '' ?>
    </div>
    <div class="flex flex-col w-full">
        <label for="password" class="font-medium">Password</label>
        <div class="relative">
            <input type="password" id="password" name="password" class="h-14 border rounded-md focus:border px-4 w-full"
                data-toggle="password">
            <button id="togglePassword" type="button" class="absolute top-2 right-2 h-10 w-10 p-2 focus:outline-none">
                <!-- Add an SVG icon or font icon for the button -->
                <!-- Below is an example of an SVG icon for an eye -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6 text-gray-600" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="eyeIcon">
                    <path
                        d="M12 2C7 2 2.63 5.1 1 12c1.63 6.9 6 10 11 10s9.37-3.1 11-10c-1.63-6.9-6-10-11-10zm0 16c-3.33 0-6-2.67-6-6s2.67-6 6-6 6 2.67 6 6-2.67 6-6 6zm0-4c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0-2c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z" />
                </svg>
            </button>
        </div>
        <?= isset($errors["password"]) ? '<p class="text-red-700 text-sm">'. $errors["password"] .'</p>' : '' ?>
    </div>

    <a href="/forgot-password" class="font-light">
        Forgot your password?
    </a>

    <input
        class="font-semibold text-center primary-button hover:hover-button-black primary-button-black flex items-center justify-center rounded-md font-grotesk cursor-pointer"
        type="Submit" value="Sign in" />

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


<script>
// JavaScript to toggle password visibility
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