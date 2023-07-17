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
                $stars = '<div class=" flex gap-1">';
                if($item["review"]){
                    for($i = 1; $i <= 5; $i++){
                        $color = $i <= $item["review"]["rating"]? "text-yellow-500": "text-neutral-300";
                        $stars .= '
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6 '. $color .'">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd" />
                        </svg>
                        ';
                    }
                }

                $stars .= "</div>";

              

                $item_div .= '
                    <div class="flex px-4 gap-4">
                        <img src="'. $item["product"]["image_link"].'" width="100" height="100" " />
                        <div class="flex flex-col">
                            <h3 class="font-bold">
                                '. $item["product"]["name"] . '
                            </h3>
                            <h3 class="">Quantity: <span class="font-semibold">'. $item["quantity"] .'</span></h3>
                            <h4 class="font-medium pt-2">₱ '. $item["price"] .'</h4>
                            '
                            .   ($order["delivery_status"] === "delivered" && $order["status"] === "paid" && $item["review"] === false? 
                                '<a href="/review?order_item_id='. $item["order_item_id"] .'" class="cursor-pointer flex px-3 rounded-sm py-1 text-sm bg-neutral-800 text-white w-fit">                                
                                    Add Review
                                </a>'
                                : "")
                            .
                                $stars
                            .
                            '
                        </div>
                    </div>
                ';
            }

            $item_div .= '</div>';

            $payment_cash= '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
            </svg>';

            $payment_gcash = '<img src="/images/gcash.png" width="20" height="20" class="w-6 h-6" />';

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
                                        '. ($order["payment_method"] === "gcash"? $payment_gcash: $payment_cash) .'
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