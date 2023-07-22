<?php 
    view("partials/head.php", [
        'title' => $title,
    ]);

    view("admin/partials/header.php");
?>

<div class="container flex flex-col justify-center items-center p-20">
    <div class="flex flex-col xl:flex-row rounded-lg shadow-xl overflow-hidden w-full">
        <?php view("admin/partials/sidebar.php"); ?>

        <main class="pb-20  w-full">
            <div
                class="w-full h-16  bg-neutral-100 text-center flex items-center justify-center text-xl font-grotesk font-black tracking-widest">
                DASHBOARD
            </div>

            <section class="grid md:grid-cols-2 lg:grid-cols-3 p-10 gap-10">
                <!--  -->
                <div class="shadow-md p-5">
                    <h1 class="font-bold text-lg"> Total Earned (Paid):</h1>
                    <div class="pt-4 flex justify-end">
                        <p class="text-neutral-600 text-lg font-grotesk"> ₱
                            <?= number_format($earnings_paid["amount"], 2, '.', ',') ?></p>
                    </div>
                </div>

                <!-- Total orders -->

                <div class="shadow-md p-5">
                    <h1 class="font-bold text-lg"> Incoming Earnings (Unpaid):</h1>
                    <div class="pt-4 flex justify-end">
                        <p class="text-neutral-600 text-lg font-grotesk"> ₱
                            <?= number_format($earnings_unpaid["amount"], 2, '.', ',') ?></p>
                    </div>
                </div>

                <div class="shadow-md p-5">
                    <h1 class="font-bold text-lg"> Orders Delivered:</h1>
                    <div class="pt-4 flex justify-end">
                        <p class="text-neutral-600 text-lg font-grotesk">
                            <?= $delivery_successful["amount"] ?></p>
                    </div>
                </div>


                <div class="shadow-md p-5">
                    <h1 class="font-bold text-lg"> Ongoing Orders:</h1>
                    <div class="pt-4 flex justify-end">
                        <p class="text-neutral-600 text-lg font-grotesk">
                            <?= $delivery_ongoing["amount"] ?></p>
                    </div>
                </div>

                <div class="shadow-md p-5">
                    <h1 class="font-bold text-lg"> Cancelled Orders:</h1>
                    <div class="pt-4 flex justify-end">
                        <p class="text-neutral-600 text-lg font-grotesk">
                            <?= $delivery_cancelled["amount"] ?></p>
                    </div>
                </div>
            </section>


            <article class="p-10">
                <h1 class="text-xl font-bold pb-4">Most Ordered Products</h1>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-5">

                    <?php foreach ($products as $index => $product): ?>
                    <div class="shadow-md p-5 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-end ">
                                <p
                                    class="text-xs font-bold font-grotesk rounded-full bg-neutral-500 px-3 py-1 text-white">
                                    Rank <?= $index + 1 ?></p>
                            </div>
                            <div class="pt-2 text-start flex flex-col">
                                <h1 class="font-medium text-md"><?= $product["quantity"] ?> orders</h1>
                                <h1 class="font-bold "><?= $product["name"] ?></h1>
                                <h1 class="text-sm">product #<?= $product["product_id"] ?></h1>
                            </div>

                        </div>
                        <div class="flex justify-between pt-5">
                            <img src="<?= $product["image_link"] ?>" width="75" height="75" />
                            <a href="/products/show?product_id=<?= $product['product_id']?>" target="_blank"
                                class="flex justify-end text-neutral-600 text-xs font-bold font-grotesk items-end gap-2">
                                View
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>

            </article>

            <article class="p-10">
                <h1 class="text-xl font-bold pb-4">Ongoing Orders</h1>
                <form action="/admin/delivery_status" method="POST"
                    class="grid md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-5">

                    <?php foreach ($ongoing_deliveries as $index => $delivery): ?>
                    <div class="shadow-md p-5 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-center">
                                <h1 class="font-light text-xs text-neutral-800">
                                    <?= DateTime::createFromFormat('Y-m-d H:i:s', $delivery["order_date"])->format('F j, Y - h:i A') ?>
                                </h1>
                                <p
                                    class="text-xs font-bold font-grotesk rounded-full bg-neutral-500 px-3 py-1 text-white">
                                    # <?= $delivery["order_id"] ?>
                                </p>
                            </div>
                            <div class="pt-2 text-start flex flex-col">


                                <h1 class="font-bold ">
                                    <?= $delivery["first_name"] . ' ' . $delivery["last_name"]  ?>
                                </h1>
                                <h1 class="font-medium  text-sm">₱ <?= $delivery["total_amount"] ?></h1>

                                <div class="flex gap-2 text-xs items-center pt-2">
                                    <div
                                        class='px-2 py-1 rounded-md <?= $delivery["status"] == 1? "bg-green-600 text-white" : "bg-neutral-500 text-white"?>'>
                                        <?= $delivery["status"] == 1? "paid" : "unpaid" ?>
                                    </div>
                                    <div class='px-2 py-1 rounded-md bg-neutral-500 text-white'>
                                        <?= $delivery["delivery_status"]?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="pt-4">
                            <input type="text" name="order_id[]" hidden value="<?= $delivery["order_id"] ?>" />
                            <input type="text" name="default_long_status[]" hidden
                                value="<?= $delivery["long_status"] ?>" />
                            <div class="flex flex-col w-full gap-2 text-sm col-span-12">
                                <label for="long_status[]" class="font-medium">Delivery Status</label>
                                <textarea name="long_status[]" 
                                    placeholder="Enter delivery status here..."
                                    class="p-4 border rounded-md focus:border w-full h-40"><?= $delivery["long_status"] ?></textarea>
                            </div>
                            <div class="flex justify-end pt-5">
                                <button type="submit"
                                    class="flex justify-end px-3 py-1 rounded-lg text-xs font-bold font-grotesk items-end gap-2 primary-button primary-button-white hover:hover-button-white">
                                    Add Delivery Status
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </form>
            </article>


        </main>
    </div>
</div>

<script src="/js/admin.js">
</script>
<?php view("partials/footer.php") ?>