<?php 
    view("partials/head.php", [
        'title' => $title,
    ]);

    view("admin/partials/header.php");
?>

<div class="container flex flex-col justify-center items-center p-20 ">
    <div class="flex flex-col xl:flex-row rounded-lg shadow-xl overflow-hidden w-full">
        <?php view("admin/partials/sidebar.php"); ?>

        <div class="pb-20 w-full">
            <div
                class="w-full h-16  bg-neutral-100 text-center flex items-center justify-center text-xl font-grotesk font-black tracking-widest">
                SETTINGS
            </div>

            <form action="/admin/settings" method="POST" class="px-16 py-10 w-full">
                <input type="text" name="_method" hidden value="patch" />
                <section>
                    <div class="flex flex-col w-full gap-2 text-sm col-span-3">
                        <label for="shipping_fee" class="font-medium">Shipping Fee</label>
                        <input required type="number" id="shipping_fee" name="shipping_fee" min="0"
                            class="h-10 border rounded-md focus:border px-4 w-full"
                            value="<?= $_POST['shipping_fee'] ?? $shipping_fee ?>" />
                        <?= isset($errors["shipping_fee"]) ? '<p class="text-red-700 text-sm">'. $errors["shipping_fee"] .'</p>' : '' ?>
                    </div>
                    <div class="flex flex-col w-full gap-2 text-sm col-span-3">
                        <label for="installation_fee" class="font-medium">Installation Fee</label>
                        <input required type="number" id="installation_fee" name="installation_fee" min="0" step="1"
                            class="h-10 border rounded-md focus:border px-4 w-full"
                            value="<?= $_POST['installation_fee'] ??  $installation_fee ?>" />
                        <?= isset($errors["installation_fee"]) ? '<p class="text-red-700 text-sm">'. $errors["installation_fee"] .'</p>' : '' ?>
                    </div>

                    <div class="flex justify-end col-span-12 mt-8">
                        <input value="Update" type="submit"
                            class="primary-button primary-button-black px-10 hover:scale-105 border rounded-md cursor-pointer font-semibold" />
                    </div>
                </section>

            </form>
        </div>
    </div>
</div>

<script src="/js/admin.js">
</script>
<?php view("partials/footer.php") ?>