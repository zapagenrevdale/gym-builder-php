<div class="container flex flex-col items-center font-medium mt-20">
    <h4 class="uppercase underline underline-offset-8 mb-4 text-sm text-center">
        SHOP OUR PRODUCTS
    </h4>
    <h2 class="font-bold mb-14 text-center">Durable Equipments</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-7 items-center">
        <?php
        foreach ($products as $product) {
            echo '

            <a  href="/products/show?product_id='. $product["product_id"]  .'" class="group flex flex-col h-full shadow-lg p-4 rounded-lg cursor-pointer overflow-hidden">
                <div class=" relative pb-4 overflow-hidden  rounded-md ">
                    <image src="' . $product["image_link"] .'" class=" peer w-full max-w-[350px] h-auto group-hover:scale-105 duration-300 hover:blur-[2px]" />
                    <div class="hidden peer-hover:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-20 rounded-full duration-200" >
                            <div class="bg-white/70 rounded-full p-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" 
                                    class="h-14 w-14"
                                    />
                                </svg>
                            </div>
                    </div>
                 
                </div>
                <div class="flex flex-col items-center justify-center border py-2 rounded-md primary-button-white group-hover:hover-button-white transition-colors duration-300">
                   <p class="text-center text-sm font-semibold"> ' . $product["name"] .' </p>
                   <p class="font-light text-sm"> Php ' . $product["price"] .' </p>
                </div>

            </a>
                ';
        }
        ?>
    </div>

</div>

<div>


</div>