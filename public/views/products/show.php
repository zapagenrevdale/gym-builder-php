<?php
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("partials/header.php");
?>

<div class="flex  flex-row  justify-center items-center px-20 py-24">
    <div class="flex flex-col lg:flex-row  rounded-lg overflow-hidden shadow-lg">
        <div>
            <image src="<?= $product["image_link"] ?>" class="w-full max-h-[500px] max-w-[500px]" />
        </div>
        <div class="flex flex-col justify-between items-center p-10">
            <div>
                <h1 class="text-2xl font-bold"><?= $product["name"] ?></h1>
                <h3 class="text-xl font-medium pb-10">₱<?= $product["price"] ?></h3>
                <pre><?= $product["description"] ?></pre>
                <h3 class="pt-14">Items remaining: <span class="pl-4 font-semibold"
                        id="items"><?= $product["item"] ?></span></h3>
            </div>
            <div>
                <h3 class="pt-6 pb-2 font-semibold">Quantity</h3>
                <form action="/cart" method="POST" class="flex gap-2">
                    <input type="text" hidden value="<?= $product["product_id"] ?>" name="product_id" />
                    <div class="border flex  items-center justify-center gap-4 px-4">
                        <button onclick="decrementQuantity()" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                            </svg>
                        </button>

                        <input id="quantity" name="quantity" class="w-5" type="text" value="0" />

                        <button onclick="appendQuantity()" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>

                    </div>
                    <button id="cart" type="submit"
                        class="primary-button primary-button-black hover:bg-neutral-800/90 flex gap-4 rounded-md font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>

                        Add To Cart

                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
const items = parseInt(document.getElementById('items').textContent);
var quantityInput = document.getElementById('quantity');
var cartButton = document.getElementById('cart');


function appendQuantity() {
    var quantity = parseInt(quantityInput.value);
    if (quantity < items) {
        quantity += 1;
        quantityInput.value = quantity.toString();
        cartButton.disabled = false;
    }
}

function decrementQuantity() {
    var quantity = parseInt(quantityInput.value);
    if (quantity > 0) {
        quantity -= 1;
        quantityInput.value = quantity.toString();
    }

    if (quantity === 0) {
        button.disabled = true;
    }

}
</script>

<?php view("partials/footer.php"); ?>