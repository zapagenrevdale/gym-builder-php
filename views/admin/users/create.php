<?php 
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("admin/partials/header.php");
?>

<div class="container flex flex-col justify-center items-center p-20">
    <div class="flex flex-col xl:flex-row rounded-lg shadow-xl overflow-hidden w-full">
        <?php view("admin/partials/sidebar.php"); ?>

        <main class="flex-grow pb-20">
            <div
                class="w-full h-16 bg-neutral-100 text-center flex items-center justify-center text-xl font-grotesk font-black tracking-widest">
                CREATE USER
            </div>

            <div class="h-full">
                <div class="h-full w-full bg-white p-10 flex flex-col gap-4">

                    <form class="grid grid-cols-12 gap-4" action="/admin/users" method="POST"
                        enctype="multipart/form-data">
                        <input type="text" name="_method" hidden value="POST" />
                        <div class="flex flex-col w-full gap-2 text-sm col-span-6">
                            <label for="first_name" class="font-medium">First Name</label>
                            <input required type="text" id="first_name" name="first_name"
                                class="h-10 border rounded-md focus:border px-4 w-full"
                                value="<?= $_POST['first_name'] ?? "" ?>" />
                            <?= isset($errors["first_name"]) ? '<p class="text-red-700 text-sm">'. $errors["first_name"] .'</p>' : '' ?>
                        </div>
                        <div class="flex flex-col w-full gap-2 text-sm col-span-6">
                            <label for="last_name" class="font-medium">Last Name</label>
                            <input required type="text" id="last_name" name="last_name"
                                class="h-10 border rounded-md focus:border px-4 w-full"
                                value="<?= $_POST['last_name'] ?? "" ?>" />
                            <?= isset($errors["last_name"]) ? '<p class="text-red-700 text-sm">'. $errors["last_name"] .'</p>' : '' ?>
                        </div>

                        <div class="flex flex-col w-full gap-2 text-sm col-span-6">
                            <label for="email" class="font-medium">Email</label>
                            <input required type="email" id="email" name="email"
                                class="h-10 border rounded-md focus:border px-4 w-full"
                                value="<?= $_POST['email'] ?? "" ?>" />
                            <?= isset($errors["email"]) ? '<p class="text-red-700 text-sm">'. $errors["email"] .'</p>' : '' ?>
                        </div>

                        <div class="flex flex-col w-full gap-2 text-sm col-span-6">
                            <label for="password" class="font-medium">Password</label>
                            <input required type="password" id="password" name="password"
                                class="h-10 border rounded-md focus:border px-4 w-full"
                                value="<?= $_POST['password'] ?? "" ?>" />
                            <?= isset($errors["password"]) ? '<p class="text-red-700 text-sm">'. $errors["password"] .'</p>' : '' ?>
                        </div>

                        <div class="flex flex-col w-full gap-2 text-sm col-span-3">
                            <label for="admin" class="font-medium">Admin Access</label>
                            <select class="h-10 border rounded-md focus:border px-4 w-full" name="admin">
                                <option value="0" selected>
                                    NO
                                </option>
                                <option value="1">
                                    YES
                                </option>
                            </select>
                        </div>

                        <div class="flex justify-end col-span-12">
                            <input value="Proceed" type="submit"
                                class="primary-button primary-button-black px-10 hover:scale-105 border rounded-md cursor-pointer font-semibold" />
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

<?php view("partials/footer.php") ?>