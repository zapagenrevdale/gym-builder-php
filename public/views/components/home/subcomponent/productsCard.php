<?php

function renderProductCard($product)
{
    
    echo '<div class="relative rounded-lg overflow-hidden">
                <div class="max-h-[380px] max-w-[300px] hover:scale-110 transition-all duration-300">
                    <img src="' . $product["image_link"] . '" alt="product"
                        class="min-w-full min-h-[380px] object-cover object-top">
                </div>
                <button
                    class="primary-button primary-button-white hover:hover-button-white flex items-center justify-between absolute bottom-6 left-1/2 -translate-x-1/2 w-5/6 rounded-md font-grotesk">
                    <h6 class="font-semibold">' . $product["name"] . '</h6>
                    <p class="font-light font-sans text-sm">' . 1 . ' ITEMS</p>
                </button>
            </div>';
}

?>