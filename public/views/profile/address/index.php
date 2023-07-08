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
                <a href="">Address</a>
            </div>
        </div>

        <div class="flex divide-x-2">
            <?php view("profile/component/sidebar.php"); ?>
            <div class="px-20 w-[1000px] ">
                <h1 class="text-lg pb-16">Hello, <span
                        class="font-semibold"><?= $user["first_name"] . ' ' . $user["last_name"]  ?></span></h1>
                <h1 class="text-3xl font-semibold pb-6">Address details</h1>
                <form class="flex flex-col" action="/profile/address" method="POST">
                    <input type="text" name="_method" hidden value="patch" />
                    <input type="text" name="user_id" hidden value="<?= $user["user_id"] ?>" />

                    <div class="py-4 flex items-end">
                        <label for="address_line1" class="w-44">Address Line 1</label>
                        <input required type="text" id="address_line1" name="address_line1"
                            class="h-8 focus:outline-none border-b focus:focus:border-b-2 focus:border-neutral-700 border-neutral-300 w-full "
                            value="<?= $address['address_line1'] ?? "" ?>" />
                    </div>
                    <?= isset($errors["address_line1"]) ? '<p class="text-red-700 text-sm">'. $errors["address_line1"] .'</p>' : '' ?>

                    <div class="py-4 flex items-center">
                        <label for="address_line2" class="w-44">Address Line 2</label>
                        <input required type="text" id="address_line2" name="address_line2"
                            class="h-10 focus:outline-none border-b focus:focus:border-b-2 focus:border-neutral-700 border-neutral-300 w-full "
                            value="<?= $address['address_line2'] ?? "" ?>" />
                    </div>
                    <?= isset($errors["address_line2"]) ? '<p class="text-red-700 text-sm">'. $errors["address_line2"] .'</p>' : '' ?>

                    <div class="py-4 flex items-center">
                        <label for="city" class="w-44">City</label>
                        <input required type="text" id="city" name="city"
                            class="h-10 focus:outline-none border-b focus:focus:border-b-2 focus:border-neutral-700 border-neutral-300 w-full "
                            value="<?= $address['city'] ?? "" ?>" />
                    </div>
                    <?= isset($errors["city"]) ? '<p class="text-red-700 text-sm">'. $errors["city"] .'</p>' : '' ?>

                    <div class="py-4 flex items-center">
                        <label for="country" class="w-44">Country</label>
                        <input required type="text" id="country" name="country"
                            class="h-10 focus:outline-none border-b focus:focus:border-b-2 focus:border-neutral-700 border-neutral-300 w-full "
                            value="<?= $address['country'] ?? "" ?>" />
                    </div>
                    <?= isset($errors["country"]) ? '<p class="text-red-700 text-sm">'. $errors["country"] .'</p>' : '' ?>

                    <div class="py-4 flex items-center">
                        <label for="postal_code" class="w-44">Postal Code</label>
                        <input required type="text" id="postal_code" name="postal_code"
                            class="h-10 focus:outline-none border-b focus:focus:border-b-2 focus:border-neutral-700 border-neutral-300 w-full "
                            value="<?= $address['postal_code'] ?? "" ?>" />
                    </div>
                    <?= isset($errors["city"]) ? '<p class="text-red-700 text-sm">'. $errors["city"] .'</p>' : '' ?>

                    <button type="submit"
                        class="w-40 mt-3 primary-button text-center  primary-button-black hover:bg-neutral-800/90 flex justify-center items-center gap-4 rounded-md font-semibold">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
<?php view("partials/footer.php"); ?>