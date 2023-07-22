<?php 
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("admin/partials/header.php");
?>

<div class="container flex flex-col justify-center items-center p-20 ">
    <div class="flex flex-col xl:flex-row rounded-lg shadow-xl overflow-hidden w-full">
        <?php view("admin/partials/sidebar.php"); ?>

        <main class="w-full pb-20 ">
            <div
                class="w-full h-16 bg-neutral-100 text-center flex items-center justify-center text-xl font-grotesk font-black tracking-widest">
                EDIT USER
            </div>
            <div class="w-full h-full bg-neutral-800/50">
                <div class=" h-full w-full bg-white p-10 flex flex-col gap-4">
                    <form class="grid grid-cols-12 gap-4" action="/admin/users" method="POST"
                        enctype="multipart/form-data">
                        <input type="text" name="_method" hidden value="patch" />
                        <input type="text" name="user_id" hidden value="<?= $edit_user["user_id"] ?>" />
                        <div class="flex flex-col w-full gap-2 text-sm col-span-6">
                            <label for="first_name" class="font-medium">First Name</label>
                            <input required type="text" id="first_name" name="first_name"
                                class="h-10 border rounded-md focus:border px-4 w-full"
                                value="<?= $edit_user['first_name'] ?? "" ?>" />
                            <?= isset($errors["first_name"]) ? '<p class="text-red-700 text-sm">'. $errors["first_name"] .'</p>' : '' ?>
                        </div>
                        <div class="flex flex-col w-full gap-2 text-sm col-span-6">
                            <label for="last_name" class="font-medium">Last Name</label>
                            <input required type="text" id="last_name" name="last_name"
                                class="h-10 border rounded-md focus:border px-4 w-full"
                                value="<?= $edit_user['last_name'] ?? "" ?>" />
                            <?= isset($errors["last_name"]) ? '<p class="text-red-700 text-sm">'. $errors["last_name"] .'</p>' : '' ?>
                        </div>

                        <div class="flex flex-col w-full gap-2 text-sm col-span-6">
                            <label for="email" class="font-medium">Email</label>
                            <input required type="email" id="email" name="email"
                                class="h-10 border rounded-md focus:border px-4 w-full"
                                value="<?= $edit_user['email'] ?? "" ?>" />
                            <?= isset($errors["email"]) ? '<p class="text-red-700 text-sm">'. $errors["email"] .'</p>' : '' ?>
                        </div>

                        <div class="flex flex-col w-full gap-2 text-sm col-span-6">
                            <label for="password" class="font-medium">Password</label>
                            <div class="relative">
                                <input type="password" id="password" name="password"
                                    class="h-10 border rounded-md focus:border px-4 w-full" data-toggle="password">
                                <button id="togglePassword" type="button"
                                    class="absolute top-2 right-2 h-6 w-6 p-1 focus:outline-none">
                                    <!-- Add an SVG icon or font icon for the button -->
                                    <!-- Below is an example of an SVG icon for an eye -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="h-4 w-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" id="eyeIcon">
                                        <path
                                            d="M12 2C7 2 2.63 5.1 1 12c1.63 6.9 6 10 11 10s9.37-3.1 11-10c-1.63-6.9-6-10-11-10zm0 16c-3.33 0-6-2.67-6-6s2.67-6 6-6 6 2.67 6 6-2.67 6-6 6zm0-4c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0-2c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1z" />
                                    </svg>
                                </button>
                            </div>
                            <?= isset($errors["password"]) ? '<p class="text-red-700 text-sm">'. $errors["password"] .'</p>' : '' ?>
                        </div>

                        <div class="flex flex-col w-full gap-2 text-sm col-span-3">
                            <label for="admin" class="font-medium">Admin Access</label>
                            <select class="h-10 border rounded-md focus:border px-4 w-full" name="admin">
                                <option value="0" <?= $edit_user["admin"] == 0? "selected": "" ?>>
                                    NO
                                </option>
                                <option value="1" <?= $edit_user["admin"] == 0? "": "selected" ?>>
                                    YES
                                </option>
                            </select>
                        </div>

                        <div class="flex justify-end col-span-12">
                            <input value="Proceed" type="submit"
                                class="primary-button primary-button-black px-10 hover:scale-105 border rounded-md cursor-pointer font-semibold" />
                        </div>
                    </form>

                    <?php view("admin/users/delete.php", ["user_id" => $edit_user["user_id"]]) ?>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
// JavaScript to toggle password visibility
const togglePassword = document.getElementById("togglePassword");
const passwordInput = document.getElementById("password");
const eyeIcon = document.getElementById("eyeIcon");

togglePassword.addEventListener("click", function() {
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.remove("text-gray-600");
        eyeIcon.classList.add(
            "text-blue-500"); // Change the color when the password is visible
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("text-blue-500");
        eyeIcon.classList.add(
            "text-gray-600"); // Change the color back when the password is hidden
    }
});
</script>


<?php view("partials/footer.php") ?>