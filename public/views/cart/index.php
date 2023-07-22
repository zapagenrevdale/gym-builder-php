<?php
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("partials/header.php");
?>

<div class="flex flex-col h-screen">

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
                    <div class="w-16">
                    </div>
                    <h4 class="w-[300px] text-center">Product</h4>
                    <h4 class="w-24 ">Price</h4>
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
                                            <form action="/cart" method="POST" class="w-16 flex items-center justify-center">
                                                    <input type="text" name="_method" hidden value="delete" />
                                                    <input type="text" id="cart_id" name="cart_id" hidden value="'. $cart["cart_id"] .'" />
                                                <button type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <div class="w-[300px] flex gap-2">
                                                <img src="'. $product["image_link"] .'" class="w-20 h-20" />
                                                <div class="flex flex-col ">
                                                    <h3 class="font-bold">
                                                        '. $product["name"] . '
                                                    </h3>
                                                    <h3 class="text-sm">Items available: <span class="pl-4 font-semibold" id="items_'. $cart["cart_id"] .'">'. $product["item"] .'</span></h3>
                                                </div>
                                            </div>
                                            <div class="w-24 flex items-center ">
                                                ₱'. $product["price"]  .'
                                            </div>
                                            <div class="w-36 flex items-center ">
                                                <form action="/cart" method="POST" class="border flex  items-center  gap-2 px-4 h-10 rounded-full">
                                                    <input type="text" name="_method" hidden value="patch" />
                                                    <input type="text" id="cart_id" name="cart_id" hidden value="'. $cart["cart_id"] .'" />
                                                    <button onclick="decrementQuantity(' . $cart["cart_id"] .', '. $product["price"] .')" type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                                        </svg>
                                                    </button>
                                                    <input id="quantity_'. $cart["cart_id"] .'" name="quantity" class="w-5" type="text" value="' . $cart["quantity"] .'" class="text-sm" />
                                                    <button onclick="appendQuantity(' . $cart["cart_id"] .', '. $product["price"] .')" type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                            <p class="w-32 flex items-center" id="calculated_price_'. $cart["cart_id"] .'">
                                                ₱ '.   $cart["quantity"] * $product["price"]  .'
                                            </p>
                                        </div>
                                ';
                                }
                ?>
            </div>
            <div class="p-10 bg-neutral-100 rounded-md w-[400px] flex flex-col gap-3 h-fit">
                <h1 class="text-xl font-semibold">Order Summary</h1>
                <div class="flex justify-between items-center">
                    <p>Subtotal (<?= sizeof($carts) ?> items)</p>
                    <p class="font-semibold">₱ <?= $subtotal ?></p>
                </div>
                <div class="flex justify-between items-center">
                    <p>Shipping Fee</p>
                    <p class="font-semibold">₱ <?= $shipping_fee ?></p>
                </div>
                <div class="flex justify-between items-center">
                    <p>Installation Fee</p>
                    <p class="font-semibold">₱ <?= $installation_fee ?></p>
                </div>
                <hr />
                <div class="flex justify-between items-center">
                    <p>Subtotal</p>
                    <p class="font-semibold">₱ <?= $subtotal+$installation_fee+$shipping_fee ?></p>
                </div>

                <a href="/checkout"
                    class="mt-3 primary-button text-center  primary-button-black hover:bg-neutral-800/90 flex justify-center items-center gap-4 rounded-md font-semibold">
                    Proceed to Checkout
                </a>
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
var cartButton = document.getElementById('cart');

function appendQuantity(cartId, price) {
    var quantityInput = document.getElementById('quantity_' + cartId);
    const items = parseInt(document.getElementById('items_' + cartId).textContent);
    var quantity = parseInt(quantityInput.value);

    var calculatedPrice = document.getElementById('calculated_price_' + cartId);

    if (quantity < items) {
        quantity += 1;
        quantityInput.value = quantity.toString();
        cartButton.disabled = false;
        calculatedPrice.textContent = "₱ " + (quantity * parseFloat(price)).toString()
    }
}

function decrementQuantity(cartId, price) {
    var quantityInput = document.getElementById('quantity_' + cartId);
    const items = parseInt(document.getElementById('items_' + cartId).textContent);
    var quantity = parseInt(quantityInput.value);

    var calculatedPrice = document.getElementById('calculated_price_' + cartId);
    if (quantity > 0) {
        quantity -= 1;
        quantityInput.value = quantity.toString();
        calculatedPrice.textContent = "₱" + (quantity * parseFloat(price)).toString();
    }

}
</script>

<?php view("partials/footer.php"); ?>