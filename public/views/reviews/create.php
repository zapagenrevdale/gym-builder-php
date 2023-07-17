<?php
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("partials/header.php");
?>

<div class="flex container flex-col  justify-center items-center px-20 py-24">

    <div class="flex flex-col items-center gap-6 justify-center pb-10">
        <h1 class="text-5xl font-semibold text-center">Write a Review</h1>
        <div class="flex items-center gap-2 justify-center mb-4">
            <a href="/profile/orders">Orders</a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4 text-neutral-800">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>

            <a href="">Review Product</a>
        </div>
    </div>

    <div class="flex flex-col w-full max-w-[700px] min-h-[500px] p-10 gap-3  shadow-xl">
        <p class="text-neutral-500">
            Ordered on <?= $order["order_date"] ?>
        </p>
        <p class="text-sm pb-2">
            Rate and review purchased product.
        </p>
        <div class="flex gap-4">
            <div><img src="<?= $product["image_link"] ?>" width="75" height="75" /></div>

            <div class="flex flex-col gap-2">
                <p class="font-semibold"><?= $product["name"] ?></p>
                <div class="flex gap-2 items-center">
                    <div class="flex gap-1 text-yellow-500" id="stars">
                        <button id="star_1" onClick="toggleStar(1)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-8 h-8">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button id="star_2" onClick="toggleStar(2)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-8 h-8">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button id="star_3" onClick="toggleStar(3)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-8 h-8">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button id="star_4" onClick="toggleStar(4)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-8 h-8">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button id="star_5" onClick="toggleStar(5)">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-8 h-8">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-sm" id="review">Delighted</p>
                </div>
                <p class="text-sm">Review Detail</p>
                <form action="/review" method="POST">
                    <input type="text" id="order_item_id" name="order_item_id" hidden
                        value="<?= $order_item["order_item_id"] ?>" />
                    <input type="number" name="rating" id="rating" value="5" hidden />
                    <textarea required name="comment" rows="10" cols="50" maxlength="1000"
                        placeholder="Enter comments here..."
                        class="p-4 border rounded-md focus:border w-full"><?= $_POST['comment'] ?? "" ?></textarea>
                    <?= isset($errors["comment"]) ? '<p class="text-red-700 text-sm">'. $errors["comment"] .'</p>' : '' ?>
                    <div class="flex justify-end">
                        <button type="Submit"
                            class="mt-3 primary-button text-center  primary-button-black hover:bg-neutral-800/90 flex justify-center items-center gap-4 rounded-md font-semibold">
                            Submit Review
                        </button>
                    </div>
                </form>
            </div>


        </div>
    </div>

</div>

<script>
let rating = 5;
const input_rating = document.getElementById("rating");
const map = {
    1: "Extremely Bad",
    2: "Dissatisfied",
    3: "Fair",
    4: "Satisfied",
    5: "Delighted",
}

function toggleStar(rate) {
    rating = rate;
    input_rating.value = rate;
    resetColors();
}

function resetColors() {
    for (let i = 1; i <= 5; i++) {
        const star = document.getElementById(`star_${i}`);
        if (i <= rating) {
            star.classList.remove("text-neutral-300");
            star.classList.add("text-yellow-400");
        } else {
            star.classList.add("text-neutral-300");
            star.classList.remove("text-yellow-400");
        }
    }
    const review = document.getElementById("review");
    review.textContent = map[rating];
}
</script>

<?php view("partials/footer.php"); ?>