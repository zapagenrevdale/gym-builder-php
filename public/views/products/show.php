<?php
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("partials/header.php");
?>

<div class="flex  flex-col  justify-center items-center px-20 py-24">
    <div class="flex flex-col lg:flex-row  rounded-lg overflow-hidden shadow-lg">
        <div>
            <image src="<?= $product["image_link"] ?>" class="w-full max-h-[500px] max-w-[500px]" />
        </div>
        <div class="flex flex-col justify-between items-center p-10">
            <div>
                <h1 class="text-2xl font-bold"><?= $product["name"] ?></h1>
                <?php
                    $stars = '<div class=" flex gap-1 py-1 ">';
                    if($product["rating"]){
                        for($i = 1; $i <= 5; $i++){
                            $color = $i <= $product["rating"]? "text-yellow-500": "text-neutral-300";
                            $stars .= '
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6 '. $color .'">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                    clip-rule="evenodd" />
                            </svg>
                            ';
                            if($i === 5){
                                $stars .= "<p class='text-neutral-500 text-lg'>(". $product["rating_count"] .")</p>";
                            }
                        }
                    }

                    $stars .= "</div>";
                    echo $stars;
                ?>

                <h3 class="text-xl font-medium pb-10">₱<?= $product["price"] ?></h3>
                <pre><?= $product["description"] ?></pre>
                <h3 class="pt-14">Items remaining: <span class="pl-4 font-semibold"
                        id="items"><?= $product["item"] ?></span></h3>
            </div>
            <div>
                <h3 class="pt-6 pb-2 font-semibold">Quantity</h3>
                <form action="/cart" method="POST" class="flex gap-2">
                    <input type="text" hidden value="<?= $product["product_id"] ?>" name="product_id" />
                    <div class="border flex  items-center justify-center gap-4 px-4 h-13">
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
                    <?php if($product["item"] == 0): ?>
                    <h1 class="text-xl font-bold text-red-600 py-2 px-2">
                        SOLD OUT
                    </h1>

                    <?php else: ?>
                    <button id="cart" type="submit"
                        class="primary-button primary-button-black hover:bg-neutral-800/90 flex gap-4 rounded-md font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        Add To Cart
                    </button>

                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>


    <?php if($product["reviews"]): ?>
    <div class="flex flex-col items-center pt-20 gap-6 max-w-[1536px]">
        <div class="flex gap-4 items-center font-grotesk pb-8">
            <h3 class="text-3xl font-black">
                PRODUCT RATING:
            </h3>
            <p class="text-3xl font-bold">
                <span class="text-neutral-600"><?= round($product["rating"], 1) ?> </span>
                <span> / 5</span>
            </p>
        </div>

        <?php foreach($product["reviews"] as $review): ?>

        <div class="flex flex-col min-w-full max-w-[800px]">
            <!-- stars  -->
            <div class="flex justify-between items-center">
                <?php
                    $stars = '<div class=" flex gap-1 py-1 ">';

                    for($i = 1; $i <= 5; $i++){
                        $color = $i <= $review["rating"]? "text-yellow-500": "text-neutral-300";
                        $stars .= '
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-6 h-6 '. $color .'">
                            <path fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd" />
                        </svg>
                        ';
                    }

                    $stars .= "</div>";
                    echo $stars;
                ?>
                <time><?= date("F d, Y", strtotime($review["created_at"])); ?></time>
            </div>

            <h5 class="text-neutral-600">
                <?= $review["name"] ?>
            </h5>

            <div class="w-full bg-neutral-100 mt-3 p-2">
                <p class="text-lg">
                    <?= $review["comment"] ?>
                </p>
            </div>


        </div>

        <?php endforeach; ?>

    </div>

    <?php endif; ?>


    <?php if($tutorial): ?>

    <div class="flex flex-col items-center pt-20 gap-4 max-w-[1536px]">

        <div class="flex text-start font-semibold text-2xl">
            Watch our Tutorial here. . .
        </div>
        <div class="max-w-[500px] w-full">
            <video src="<?= $tutorial["video_link"] ?>" controls class="rounded-md shadow-md">
            </video>
        </div>
        <h1 class="text-3xl font-bold uppercase">
            <?= $tutorial["title"] ?>
        </h1>
        <p class="text-justify text-xl p-3 bg-neutral-100 rounded-md">
            <?= $tutorial["content"] ?>
        </p>

    </div>

    <?php endif; ?>


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

    if (quantity == 0) {
        button.disabled = true;
    }

}
</script>

<?php view("partials/footer.php"); ?>