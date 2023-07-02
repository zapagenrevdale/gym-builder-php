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
                                    <button class="text-blue-700 cursor-pointer hover:underline underline-offset-4" onclick=(redirectToEdit(' . $product["product_id"] .'))>Edit</button>
                                </td>
                            </tr>'; 
                    }
                ?>
        </tbody>
    </table>
</article>