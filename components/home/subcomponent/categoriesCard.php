<?php

function renderCategoriesCard($category)
{
    $href = "./categories/" . $category["slug"];
    echo '<div class="relative rounded-lg overflow-hidden">
                <div class="max-h-[380px] max-w-[300px] hover:scale-110 transition-all duration-300">
                    <img src="' . $category["image"] . '" alt="category"
                        class="min-w-full min-h-[380px] object-cover object-top">
                </div>
                <button
                    class="primary-button primary-button-white hover:hover-button-white flex items-center justify-between absolute bottom-6 left-1/2 -translate-x-1/2 w-5/6 rounded-md font-grotesk">
                    <h6 class="font-semibold">' . $category["name"] . '</h6>
                    <p class="font-light font-sans text-sm">' . $category["items"] . ' ITEMS</p>
                </button>
            </div>';
}

?>