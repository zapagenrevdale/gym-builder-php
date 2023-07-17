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

            <article class="grid grid-cols-3 p-10 gap-10">
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
            </article>


            <article class="p-10">
                <h1 class="text-xl font-bold">Most Ordered Products</h1>
                <div class="grid grid-cols-4 gap-5">

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


        </main>
    </div>
</div>

<script src="/js/admin.js">
</script>
<?php view("partials/footer.php") ?>