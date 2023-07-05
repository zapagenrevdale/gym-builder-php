<div class="container flex flex-col items-center font-medium mt-20">
    <h4 class="uppercase underline underline-offset-8 mb-4 text-sm text-center">
        SHOP OUR PRODUCTS
    </h4>
    <h2 class="font-bold mb-14 text-center">Durable Equipments</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-7 items-center">
        <?php
        foreach ($products as $product) {
            echo '

            <div class="flex flex-col h-full shadow-lg p-4 rounded-lg cursor-pointer overflow-hidden">
                <div class="pb-4 overflow-hidden  rounded-md ">
                    <image src="' . $product["image_link"] .'" class="w-full max-w-[350px] h-auto hover:scale-105 duration-300 " />
                </div>
                <div class="flex flex-col items-center justify-center border py-2 rounded-md primary-button-white hover:hover-button-white ">
                   <p class="text-center text-sm font-semibold"> ' . $product["name"] .' </p>
                   <p class="font-light text-sm"> Php ' . $product["price"] .' </p>
                </div>
            </div>
                ';
        }
        ?>
    </div>
</div>

<div>


</div>