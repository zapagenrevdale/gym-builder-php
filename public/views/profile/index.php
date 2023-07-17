<?php
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("partials/header.php");
?>

<div class="flex flex-col h-screen">

    <div class="p-12  ">
        <div class="flex flex-col items-center gap-6 justify-center pb-20">
            <h1 class="text-5xl font-semibold text-center">My Account</h1>
            <div class="flex items-center gap-2 justify-center mb-4">
                <a href="">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 text-neutral-800">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
                <a href="">Account</a>
            </div>
        </div>

        <div class="flex divide-x-2">
            <?php view("profile/component/sidebar.php"); ?>
            <div class="px-20 w-[1000px] ">
                <h1 class="text-lg pb-16">Hello, <span
                        class="font-semibold"><?= $user["first_name"] . ' ' . $user["last_name"]  ?></span></h1>
                <h1 class="text-3xl font-semibold pb-6">Account details</h1>
                <form class="flex flex-col" action="/profile" method="POST">
                    <input type="text" name="_method" hidden value="patch" />
                    <input type="text" name="user_id" hidden value="<?= $user["user_id"] ?>" />

                    <div class="py-4 flex items-end">
                        <label for="first_name" class="w-44">First Name</label>
                        <input required type="text" id="first_name" name="first_name"
                            class="h-8 focus:outline-none border-b focus:focus:border-b-2 focus:border-neutral-700 border-neutral-300 w-full "
                            value="<?= $user['first_name'] ?? "" ?>" />

                    </div>
                    <?= isset($errors["first_name"]) ? '<p class="text-red-700 text-sm">'. $errors["first_name"] .'</p>' : '' ?>
                    <div class="py-4 flex items-center">
                        <label for="last_name" class="w-44">Last Name</label>
                        <input required type="text" id="last_name" name="last_name"
                            class="h-10 focus:outline-none border-b focus:focus:border-b-2 focus:border-neutral-700 border-neutral-300 w-full "
                            value="<?= $user['last_name'] ?? "" ?>" />
                    </div>
                    <?= isset($errors["last_name"]) ? '<p class="text-red-700 text-sm">'. $errors["last_name"] .'</p>' : '' ?>

                    <div class="py-4 flex items-center">
                        <label for="email" class="w-44">Email</label>
                        <input required type="text" id="email" name="email"
                            class="h-10 focus:outline-none border-b focus:focus:border-b-2 focus:border-neutral-700 border-neutral-300 w-full "
                            value="<?= $user['email'] ?? "" ?>" />
                    </div>
                    <?= isset($errors["email"]) ? '<p class="text-red-700 text-sm">'. $errors["email"] .'</p>' : '' ?>

                    <div class="py-4 flex items-center">
                        <label class="w-44">Password</label>
                        <input type="password" id="password" name="password" placeholder="************"
                            class="h-10 focus:outline-none border-b focus:focus:border-b-2 focus:border-neutral-700 border-neutral-300 w-full " />
                    </div>
                    <?= isset($errors["password"]) ? '<p class="text-red-700 text-sm">'. $errors["password"] .'</p>' : '' ?>

                    <button type="submit"
                        class="w-40 mt-3 primary-button text-center  primary-button-black hover:bg-neutral-800/90 flex justify-center items-center gap-4 rounded-md font-semibold">
                        Update
                    </button>
                </form>

                <?php if($user["verified"] == 0): ?>

                <form action="/email-verification/send-verification" class="pt-10">
                    <h1 class="text-3xl font-bold pb-2">Notice:</h1>
                    <p class="font-semibold text-red-600">You need to verify your email so that you can order.</p>
                    <button type="submit"
                        class="mt-3 primary-button text-center  primary-button-black hover:bg-neutral-800/90 flex justify-center items-center gap-4 rounded-md font-semibold">
                        Verify Email Address
                    </button>
                </form>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php view("partials/footer.php"); ?>