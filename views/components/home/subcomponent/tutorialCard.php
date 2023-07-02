<?php

function renderTutorialCard($tutorial)
{
    echo
        '<div class="max-w-[275px]">
            <div class="aspect-square mb-4 overflow-hidden rounded-md">
                <img src="' . $tutorial["image"] . '" alt="Tutorials"
                    class="hover:scale-110 transition-transform duration-300 w-full h-full object-cover object-top">
            </div>
            <div>
                <h4 class="font-semibold">' . $tutorial["title"] . '</h4>
                <time class="font-light text-sm">' . $tutorial["date"] . '</time>
            </div>
        </div>';
}
?>