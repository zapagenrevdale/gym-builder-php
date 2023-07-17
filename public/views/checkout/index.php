<?php
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("partials/header.php");
?>

<div class="flex flex-col ">

    <div class="p-12  ">
        <div class="flex flex-col items-center gap-6 justify-center pb-20">
            <h1 class="text-5xl font-semibold text-center">Shopping Cart</h1>
            <div class="flex items-center gap-2 justify-center mb-4">
                <a href="">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 text-neutral-800">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>

                <a href="">Shopping Cart</a>
            </div>
        </div>

        <?php if(sizeof($carts) > 0): ?>
        <div class="flex gap-10">
            <div class="flex flex-col">
                <!-- label -->
                <div class="flex border-b pb-2 gap-6 font-semibold">
                    <h4 class="w-[300px] text-center">Product</h4>
                    <h4 class="w-36 ">Quantity</h4>
                    <h4 class="w-32 ">Total</h4>
                </div>

                <?php

                        $subtotal = 0;

                        foreach($carts as $cart){
                            $product = $cart["product"];
                            $subtotal += $cart["quantity"] * $product["price"];
                            echo    '
                                        <div class="flex py-8 gap-6 border-b">
                          
                                            <div class="w-[300px] flex gap-4">
                                                <img src="'. $product["image_link"] .'" class="w-20 h-20" />
                                                <div class="flex flex-col gap-2">
                                                    <h3 class="font-bold">
                                                        Heavy Duty powercage
                                                    </h3> 
                                                    <p class="font-light"> ₱ ' . $product["price"] . '</p>
                                                </div>
                                            </div>
                                            <div class="w-36 flex items-center">
                                                x' . $cart["quantity"] .'
                                            </div>
                                            <p class="w-32 flex items-center" id="calculated_price_'. $cart["cart_id"] .'">
                                                ₱ '.   $cart["quantity"] * $product["price"]  .'
                                            </p>
                                        </div>
                                ';
                                }
                ?>
            </div>

            <div>
                <?= isset($errors["address"]) ? '<p class="text-red-700 font-semibold text-center">'. $errors["address"] .'</p>' : '' ?>
                <div class="flex flex-col p-4 shadow-md rounded-md mb-4 max-w-[400px]">
                    <div class="flex items-center justify-between">
                        <h1 class="font-semibold text-xl font-grotesk pb-2">Shipping Address: </h1>
                        <a href="/profile/address" target="_blank"
                            class="primary-button primary-button-black rounded-full text-sm p-3 min-w-[100px] h-5 flex items-center justify-center">
                            update
                        </a>
                    </div>
                    <address class="pl-4 text-sm">

                        <?php 
                            if(!$address ){
                                echo "No address provided yet....";
                            }else{
                                $full_address = "";
                                $full_address .= strlen($address["address_line1"]) === 0 ? "" : $address["address_line1"] . ', ';
                                $full_address .= strlen($address["address_line2"]) === 0 ? "" : $address["address_line2"] . ', ';
                                $full_address .= strlen($address["city"]) === 0 ?  "" : $address["city"] . ', ';
                                $full_address .= strlen($address["country"]) === 0 ? "" : $address["country"] . ', ';
                                $full_address .= $address["postal_code"] ?? "";
                                
                                echo $full_address; 
                            }
                        ?>
                    </address>
                </div>

                <form action="/checkout" method="POST" class="p-10 bg-neutral-100 rounded-md w-[400px] overflow-hidden">
                    <div class="flex flex-col gap-3 h-fit mb-10">
                        <h1 class="text-xl font-semibold">Select Payment</h1>

                        <div class="flex border-neutral-500 rounded-md border px-4 py-4  justify-between text-sm"
                            id="gcash">
                            <div class="flex items-center gap-2">
                                <img src="/images/gcash.png" width="20" height="20" />
                                <h5 class="font-semibold">GCASH</h5>
                            </div>
                            <input checked onclick="highlight('gcash')" type="radio" class="form-radio text-indigo-600"
                                name="payment" value="1" />
                        </div>
                        <div class="flex  border-neutral-200 rounded-md border px-4 py-4  justify-between text-sm"
                            id="cash">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                </svg>
                                <h5 class="font-semibold">Cash on Delivery</h5>
                            </div>
                            <input onclick="highlight('cash')" type="radio" class="form-radio text-indigo-600"
                                name="payment" value="0" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-3 h-fit">
                        <h1 class="text-xl font-semibold">Order Summary</h1>
                        <div class="flex justify-between items-center">
                            <p>Subtotal (<?= sizeof($carts) ?> items)</p>
                            <p class="font-semibold">₱ <?= $subtotal ?></p>
                        </div>
                        <div class="flex justify-between items-center">
                            <p>Shipping Fee</p>
                            <p class="font-semibold">₱ 100</p>
                        </div>
                        <hr />
                        <div class="flex justify-between items-center">
                            <p>Subtotal</p>
                            <p class="font-semibold">₱ <?= $subtotal+100 ?></p>
                        </div>

                        <button type="Submit"
                            class="mt-3 primary-button text-center  primary-button-black hover:bg-neutral-800/90 flex justify-center items-center gap-4 rounded-md font-semibold">
                            Place Order Now
                        </button>
                    </div>
                </form>

            </div>


        </div>
        <?php else: ?>

        <h3 class="text-3xl font-grotesk font-semibold text-center">You have an empty cart!</h3>
        <a id="cart" type="submit" href="/"
            class="cursor-pointer mt-3 primary-button text-center  primary-button-black hover:bg-neutral-800/90 flex justify-center items-center gap-4 rounded-md font-semibold">
            Back to Home
        </a>

        <?php endif; ?>

    </div>
</div>


<script>
function highlight(id) {
    const gcash = document.getElementById("gcash");
    const cash = document.getElementById("cash");
    if (id === "cash") {
        cash.classList.remove("border-neutral-300");
        cash.classList.add("border-neutral-500");
        gcash.classList.remove("border-neutral-500");
        gcash.classList.add("border-neutral-300");
    } else {
        gcash.classList.remove("border-neutral-300");
        gcash.classList.add("border-neutral-500");
        cash.classList.remove("border-neutral-500");
        cash.classList.add("border-neutral-300");
    }
}
</script>
<?php view("partials/footer.php"); ?>