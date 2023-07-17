<div class="container flex flex-col items-center font-medium mt-20">
    <h4 class="uppercase underline underline-offset-8 mb-4 text-sm text-center">
        SHOP OUR PRODUCTS
    </h4>
    <h2 class="font-bold mb-14 text-center">Durable Equipments</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-7 items-center">
        <?php
        foreach ($products as $product) {
            $stars = '<div class=" flex gap-1 py-1  justify-center items-center">';
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
                    <div class="hidden peer-hover:flex absolute left-0 bottom-0 px-3  z-20  rounded-r-full text-white duration-200 py-2 bg-neutral-900/50" >
                        '. ($product["item"] > 0?  $product["item"] . " Items Left" : "SOLD OUT") .' 
                    </div>
                    
                 
                </div>
                <div class="flex flex-col items-center justify-center border py-2 rounded-md primary-button-white group-hover:hover-button-white transition-colors duration-300">
                   <p class="text-center text-sm font-semibold"> ' . $product["name"] .' </p>
                   <p class="font-light text-sm"> Php ' . $product["price"] .' </p>
                
                </div>
                '. $stars .'
            </a>
                ';
        }
        ?>
    </div>

</div>

<div>


</div>