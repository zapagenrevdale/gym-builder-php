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
                class="w-full h-16  bg-neutral-100 text-center flex items-center justify-center text-xl font-grotesk font-black tracking-widest">
                PRODUCTS
            </div>

            <form action="/admin/products/create" method="GET" class="flex justify-end px-16 py-8">
                <input
                    class="primary-button primary-button-black  hover:hover-button-black rounded-xl px-16 font-semibold"
                    value="Create" type="submit" />

            </form>

            <article class="px-16 ">
                <table class="overflow-hidden table-fixed w-full">
                    <thead class="table-head text-neutral-800 h-16 rounded-t-lg border ">
                        <tr class=" overflow-hidden">
                            <th class="w-24 text-left px-4">ID</th>
                            <th class="w-32 text-left px-4">Name</th>
                            <th class="w-full text-left px-4">Description</th>
                            <th class="w-24 text-left px-4">Price</th>
                            <th class="w-24 text-left px-4">Image</th>
                            <th class="w-24 text-left px-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border font-grotesk text-light">
                        <?php 
                            foreach($products as $product){
                            echo '<tr class="border">
                                        <td class="px-2 border-l">' . $product["product_id"] . '</td>
                                        <td class="px-2 border-l">' . $product["name"] .'</td>
                                        <td class="px-2 border-l">' . $product["description"] .'</td>
                                        <td class="px-2 border-l">' . $product["price"] .'</td>
                                        <td class="px-2 border-l"><img src="' . $product["image_link"] .'"
                                                alt="" class="w-20 h-20"></td>
                                        <td class="px-2 border-l text-sm text-center">
                                            <a href="/admin/products/edit?product_id='. $product["product_id"] .'" class="text-blue-700 cursor-pointer hover:underline underline-offset-4">Edit</a>
                                        </td>
                                    </tr>'; 
                            }
                        ?>
                    </tbody>
                </table>
            </article>
        </main>
    </div>
</div>

<script src="/js/admin.js">
</script>
<?php view("partials/footer.php") ?>