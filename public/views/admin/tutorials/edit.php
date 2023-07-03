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
                EDIT TUTORIAL
            </div>
            <div id="edit-product-modal" class="w-full h-full bg-neutral-800/50">
                <div class=" h-full w-full bg-white p-10 flex flex-col gap-4">
                    <form class="grid grid-cols-12 gap-4" action="/admin/tutorials" method="POST"
                        enctype="multipart/form-data">
                        <input type="text" name="_method" hidden value="patch" />
                        <input type="text" id="product_id" name="tutorial_id" hidden
                            value="<?= $edit_tutorial["tutorial_id"] ?>" />
                        <div class="flex flex-col w-full gap-2 text-sm col-span-7">
                            <label for="title" class="font-medium">Title</label>
                            <input required type="text" id="title" name="title"
                                class="h-10 border rounded-md focus:border px-4 w-full"
                                value="<?= $edit_tutorial["title"] ?? "" ?>" />
                            <?= isset($errors["title"]) ? '<p class="text-red-700 text-sm">'. $errors["title"] .'</p>' : '' ?>
                        </div>
                        <div class="flex flex-col w-full gap-2 text-sm col-start-9 col-end-13">
                            <label for="product_id" class="font-medium">Product</label>
                            <select name="product_id" id="product_id"
                                class="h-10 border rounded-md focus:border px-4 w-full">
                                <?php
                                    foreach($products as $product){
                                        $output = '<option value="'. $product["product_id"] . '" ';
                                        $output .= ($product["product_id"] === $edit_tutorial["product_id"]) ? "selected" : "";
                                        $output .= '>'. $product["name"] .'</option>';
                                        echo $output;
                                    }
                                ?>
                            </select>
                            <?= isset($errors["product_id"]) ? '<p class="text-red-700 text-sm">'. $errors["product_id"] .'</p>' : '' ?>
                        </div>
                        <div class="flex flex-col w-full gap-2 text-sm col-span-12">
                            <label for="content" class="font-medium">Content</label>
                            <textarea required id="content" name="content" rows="10" cols="30" maxlength="1000"
                                placeholder="Enter tutorial content here..."
                                class="p-4 border rounded-md focus:border w-full"><?= $edit_tutorial['content'] ?? "" ?></textarea>
                            <?= isset($errors["content"]) ? '<p class="text-red-700 text-sm">'. $errors["content"] .'</p>' : '' ?>
                        </div>
                        <div class="flex flex-col w-full gap-2 text-sm col-span-12">
                            <label for="tutorialVideo" class="font-medium">Tutorial Video</label>
                            <video controls src="<?= $edit_tutorial["video_link"] ?>"
                                class="h-40 w-60 shadow-md rounded-md">
                                Your browser does not support the video tag.
                            </video>
                            <input type="file" id="tutorialVideo" name="tutorialVideo" class="h-10  w-full" />
                            <?= isset($errors["tutorialVideo"]) ? '<p class="text-red-700 text-sm">'. $errors["tutorialVideo"] .'</p>' : '' ?>
                        </div>
                        <div class="flex justify-end col-span-12">
                            <input value="Proceed" type="submit"
                                class="primary-button primary-button-black px-10 hover:scale-105 border rounded-md cursor-pointer font-semibold" />
                        </div>
                    </form>

                    <?php view("admin/tutorials/delete.php", ["tutorial_id" => $edit_tutorial["tutorial_id"]]) ?>
                </div>
            </div>
        </main>
    </div>
</div>

<?php view("partials/footer.php") ?>