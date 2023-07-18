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
                CREATE TUTORIAL
            </div>

            <div class="h-full">
                <div class="h-full w-full bg-white p-10 flex flex-col gap-4">

                    <form class="grid grid-cols-12 gap-4" action="/admin/tutorials" method="POST"
                        enctype="multipart/form-data">
                        <input type="text" name="_method" hidden value="POST" />
                        <div class="flex flex-col w-full gap-2 text-sm col-span-7">
                            <label for="title" class="font-medium">Title</label>
                            <input required type="text" id="title" name="title"
                                class="h-10 border rounded-md focus:border px-4 w-full"
                                value="<?= $_POST['title'] ?? "" ?>" />
                            <?= isset($errors["title"]) ? '<p class="text-red-700 text-sm">'. $errors["title"] .'</p>' : '' ?>
                        </div>
                        <div class="flex flex-col w-full gap-2 text-sm col-start-9 col-end-13">
                            <label for="product_id" class="font-medium">Product</label>
                            <select name="product_id" id="product_id"
                                class="h-10 border rounded-md focus:border px-4 w-full">
                                <?php
                                    foreach($products as $product){
                                        echo '<option value="'. $product["product_id"] .'">'. $product["name"] .'</option>';
                                    }
                                ?>
                            </select>
                            <?= isset($errors["product_id"]) ? '<p class="text-red-700 text-sm">'. $errors["product_id"] .'</p>' : '' ?>
                        </div>
                        <div class="flex flex-col w-full gap-2 text-sm col-span-12">
                            <label for="content" class="font-medium">Content</label>
                            <textarea required id="content" name="content" rows="10" cols="30" maxlength="1000"
                                placeholder="Enter tutorial content here..."
                                class="p-4 border rounded-md focus:border w-full"><?= $_POST['content'] ?? "" ?></textarea>
                            <?= isset($errors["content"]) ? '<p class="text-red-700 text-sm">'. $errors["content"] .'</p>' : '' ?>
                        </div>
                        <div class="flex flex-col w-full gap-2 text-sm col-span-12">
                            <label for="tutorialVideo" class="font-medium">Tutorial Video</label>
                            <input required type="file" id="tutorialVideo" name="tutorialVideo" class="h-10  w-full" />
                            <?= isset($errors["tutorialVideo"]) ? '<p class="text-red-700 text-sm">'. $errors["tutorialVideo"] .'</p>' : '' ?>
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

<script>
var uploadField = document.getElementById("tutorialVideo");

uploadField.onchange = function() {
    if (this.files[0].size > 41943040) {
        alert("File is too big!");
        this.value = "";
    };
};
</script>


<?php view("partials/footer.php") ?>