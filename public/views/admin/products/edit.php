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
                EDIT PRODUCT
            </div>


            <div id="edit-product-modal" class="w-full h-full bg-neutral-800/50">
                <div class=" h-full w-full bg-white p-10 flex flex-col gap-4">

                    <form class="grid grid-cols-12 gap-4" action="/admin/products" method="POST"
                        enctype="multipart/form-data">
                        <input type="text" name="_method" hidden value="patch" />
                        <input type="text" id="product_id" name="product_id" hidden
                            value="<?= $edit_product["product_id"] ?>" />

                        <div class="flex flex-col w-full gap-2 text-sm col-span-7">
                            <label for="name" class="font-medium">Name</label>
                            <input required type="text" id="name" name="name"
                                class="h-10 border rounded-md focus:border px-4 w-full"
                                value="<?= $edit_product["name"]  ?>" />
                            <?= isset($errors["name"]) ? '<p class="text-red-700 text-sm">'. $errors["name"] .'</p>' : '' ?>
                        </div>
                        <div class="flex flex-col w-full gap-2 text-sm col-start-9 col-end-13">
                            <label for="price" class="font-medium">Price</label>
                            <input required type="number" id="price" name="price" min="0" step="2"
                                class="h-10 border rounded-md focus:border px-4 w-full"
                                value="<?= $edit_product["price"]  ?>" />
                            <?= isset($errors["price"]) ? '<p class="text-red-700 text-sm">'. $errors["price"] .'</p>' : '' ?>
                        </div>
                        <div class="flex flex-col w-full gap-2 text-sm col-span-12">
                            <label for="description" class="font-medium">Description</label>
                            <textarea required id="description" name="description" rows="10" cols="30" maxlength="1000"
                                placeholder="Enter product description here..."
                                class="p-4 border rounded-md focus:border w-full"><?= $edit_product["description"]  ?></textarea>
                            <?= isset($errors["description"]) ? '<p class="text-red-700 text-sm">'. $errors["description"] .'</p>' : '' ?>
                        </div>
                        <div class="flex flex-col w-full gap-2 text-sm col-span-12">
                            <label for="productImage" class="font-medium">Product Image</label>
                            <img src="<?= $edit_product["image_link"] ?>" alt="" class="w-32 h-32">
                            <input type="file" id="productImage" name="productImage" class="h-10  w-full" />
                            <?= isset($errors["productImage"]) ? '<p class="text-red-700 text-sm">'. $errors["productImage"] .'</p>' : '' ?>
                        </div>
                        <div class="flex justify-end col-span-12">
                            <input value="Proceed" type="submit"
                                class="primary-button primary-button-black px-10 hover:scale-105 border rounded-md cursor-pointer font-semibold" />
                        </div>
                    </form>
                    <?php view("admin/products/delete.php", ["product_id" => $edit_product["product_id"]]) ?>
                </div>
            </div>
        </main>
    </div>
</div>

<?php view("partials/footer.php") ?>