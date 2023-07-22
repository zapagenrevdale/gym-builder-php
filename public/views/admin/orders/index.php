<?php 
    view("partials/head.php", [
        'title' => $title,
    ]);

    view("admin/partials/header.php");
?>

<div class="container flex flex-col justify-center items-center p-20">
    <div class="flex flex-col xl:flex-row rounded-lg shadow-xl overflow-hidden">
        <?php view("admin/partials/sidebar.php"); ?>

        <form action="/admin/orders" method="POST" class="flex-grow pb-20">
            <div
                class="w-full h-16  bg-neutral-100 text-center flex items-center justify-center text-xl font-grotesk font-black tracking-widest">
                ORDERS
            </div>
            <input type="text" name="_method" hidden value="patch" />

            <article class="px-16 py-10">
                <table class="overflow-hidden table-fixed w-full">
                    <thead class="table-head text-neutral-800 h-16 rounded-t-lg border ">
                        <tr class=" overflow-hidden">
                            <th class="w-16 text-left px-4 select-none">ID</th>
                            <th class="w-28 text-left px-4 select-none">Email</th>
                            <th class="w-40 text-left px-4 select-none">Name</th>
                            <th class="w-16 text-left px-4 select-none">Total Amount</th>
                            <th class="w-12 text-left px-4 select-none" title="Payment Status">Payment</th>
                            <th class="w-16 text-left px-4 select-none" title="Delivery Status">Delivery </th>
                        </tr>
                    </thead>
                    <tbody class="border text-light ">
                        <?php 
                            foreach($orders as $order){
                            echo '<tr class="border h-12">
                                        <td class="px-2 border-l">' . $order["order_id"] . '</td>
                                        <td class="px-2 border-l">' . $order["user"]["email"] .'</td>
                                        <td class="px-2 border-l">' . $order["user"]["first_name"] .' ' . $order["user"]["last_name"] .'</td>
                                        <td class="px-2 border-l">' . $order["total_amount"] .'</td>
                                        <td class="px-2 border-l">
                                       
                                        <input type="text" name="order_id[]" hidden value="' . $order["order_id"] .'" />
                                        <select class="h-10 border rounded-md focus:border px-1 w-full" name="payment_status[]">
                                            <option value="0" '. ($order["status"] == 0? "selected": "") . '>
                                                unpaid
                                            </option>
                                            <option value="1" '. ($order["status"] == 1? "selected": "") . '>
                                                paid
                                            </option>
                                        </select>
                                            
                                        </td>
                                        <td class="px-2 border-l">
                                            <select class="h-10 border rounded-md focus:border px-1 w-full" name="delivery_status[]">
                                            
                                                <option value="processing" '. ($order["delivery_status"] === "processing"? "selected": "") . '>
                                                    processing
                                                </option>
                                                <option value="delivering" '. ($order["delivery_status"] === "delivering"? "selected": "") . '>
                                                    delivering
                                                </option>
                                                <option value="delivered" '. ($order["delivery_status"] === "delivered"? "selected": "") . '>
                                                    delivered
                                                </option>
                                                <option value="cancelled" '. ($order["delivery_status"] === "cancelled"? "selected": "") . '>
                                                    cancelled
                                                </option>

                                            </select>
                                        </td>
                                    </tr>'; 
                            }
                        ?>
                    </tbody>
                </table>
                <div class="flex justify-end pt-10">

                    <input value="Update" type="submit"
                        class="primary-button primary-button-black px-10 hover:scale-105 border rounded-md cursor-pointer font-semibold" />

                </div>
            </article>

        </form>
    </div>
</div>

<script src="/js/admin.js">
</script>
<?php view("partials/footer.php") ?>