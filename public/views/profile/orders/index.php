<?php
view("partials/head.php", [
    'title' => $title,
]);
view("partials/header.php");
?>

<div class="container flex flex-col w-full items-center pb-10">

    <div class="p-12">
        <div class="flex flex-col items-center gap-6 justify-center pb-20">
            <h1 class="text-5xl font-semibold text-center">My Orders</h1>
            <div class="flex items-center gap-2 justify-center mb-4">
                <a href="/">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 text-neutral-800">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>

                <a href="/profile/orders">Orders</a>
            </div>
        </div>
    </div>
    <div class="flex flex-col max-w-[800px] w-full gap-5">
        <!-- order -->

        <?php

        foreach ($orders as $order) {
            
            
            $item_div = '<div class="flex flex-col py-3 gap-4">';

            foreach($order["orderitems"] as $item){

                $item_div .= '
                    <div class="flex px-4 gap-4">
                        <img src="'. $item["product"]["image_link"].'" width="100" height="100" " />
                        <div class="flex flex-col">
                            <h3 class="font-bold">
                                '. $item["product"]["name"] . '
                            </h3>
                            <h3 class="">Quantity: <span class="font-semibold">'. $item["quantity"] .'</span></h3>
                            <h4 class="font-medium pt-2">₱ '. $item["price"] .'</h4>
                        </div>
                    </div>
                ';
            }

            $item_div .= '</div>';

            $order_div = '
                            <div class="flex flex-col p-4 border rounded-md shadow-md">
                                <div class="flex border-b pb-2  justify-between items-center">
                                    <div class="flex items-center gap-4 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                        <p class=" text-xl">
                                            Order <span class="text-neutral-600 font-light text-base">#' . $order["order_id"] . '</span>
                                        </p>
                                        <p class="font-light text-sm">
                                        ' . $order["order_date"] . '
                                        </p>
                                    </div>
                                    <div class="flex gap-2">
                                        <span class="rounded-full '. ($order["status"] === "paid" ?  "bg-green-600 text-white" : "bg-neutral-200"  ) . ' px-2 py-1 text-xs">
                                            '. $order["status"] .'
                                        </span>
                                        <span class="rounded-full '. ($order["delivery_status"] === "delivered" ? "bg-green-600 text-white": ($order["delivery_status"] === "cancelled" ? "bg-red-600 text-white": "bg-neutral-200")  ) .' px-2 py-1 text-xs">
                                            '. $order["delivery_status"] .'
                                        </span>
                                    </div>
                                    
                                </div>
                                '.  $item_div .'
                            </div>
                        ';
                        echo $order_div;
            }

            



        ?>


    </div>
</div>


<script>

</script>
<?php view("partials/footer.php"); ?>