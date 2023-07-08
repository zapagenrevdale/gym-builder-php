<?php 
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("admin/partials/header.php");
?>

<div class="container flex flex-col justify-center items-center p-20">
    <div class="flex flex-col xl:flex-row rounded-lg shadow-xl overflow-hidden">
        <?php view("admin/partials/sidebar.php"); ?>

        <main class="flex-grow pb-20">
            <div
                class="w-full h-16 bg-neutral-100 text-center flex items-center justify-center text-xl font-grotesk font-black tracking-widest">
                CREATE PRODUCT
            </div>

            <div id="create-product-modal" class="w-full h-full">
                <div class="h-full w-full max-h-[720px] max-w-[720px] bg-white p-10 flex flex-col gap-4">

                    <form class="grid grid-cols-12 gap-4" action="/admin/products" method="POST"
                        enctype="multipart/form-data">
                        <input type="text" name="_method" hidden value="POST" />
                        <div class="flex flex-col w-full gap-2 text-sm col-span-6">
                            <label for="name" class="font-medium">Name</label>
                            <input required type="text" id="name" name="name"
                                class="h-10 border rounded-md focus:border px-4 w-full"
                                value="<?= $_POST['name'] ?? "" ?>" />
                            <?= isset($errors["name"]) ? '<p class="text-red-700 text-sm">'. $errors["name"] .'</p>' : '' ?>
                        </div>
                        <div class="flex flex-col w-full gap-2 text-sm col-span-3">
                            <label for="price" class="font-medium">Price</label>
                            <input required type="number" id="price" name="price" min="0"
                                class="h-10 border rounded-md focus:border px-4 w-full"
                                value="<?= $_POST['price'] ?? "0" ?>" />
                            <?= isset($errors["price"]) ? '<p class="text-red-700 text-sm">'. $errors["price"] .'</p>' : '' ?>
                        </div>
                        <div class="flex flex-col w-full gap-2 text-sm col-span-3">
                            <label for="item" class="font-medium">Items</label>
                            <input required type="number" id="item" name="item" min="0" step="1"
                                class="h-10 border rounded-md focus:border px-4 w-full"
                                value="<?= $_POST['item'] ?? "0" ?>" />
                            <?= isset($errors["item"]) ? '<p class="text-red-700 text-sm">'. $errors["item"] .'</p>' : '' ?>
                        </div>
                        <div class="flex flex-col w-full gap-2 text-sm col-span-12">
                            <label for="description" class="font-medium">Description</label>
                            <textarea required id="description" name="description" rows="10" cols="30" maxlength="1000"
                                placeholder="Enter product description here..."
                                class="p-4 border rounded-md focus:border w-full"><?= $_POST['description'] ?? "" ?></textarea>
                            <?= isset($errors["description"]) ? '<p class="text-red-700 text-sm">'. $errors["description"] .'</p>' : '' ?>
                        </div>
                        <div class="flex flex-col w-full gap-2 text-sm col-span-12">
                            <label for="productImage" class="font-medium">Product Image</label>
                            <input required type="file" id="productImage" name="productImage" class="h-10  w-full" />
                            <?= isset($errors["productImage"]) ? '<p class="text-red-700 text-sm">'. $errors["productImage"] .'</p>' : '' ?>
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