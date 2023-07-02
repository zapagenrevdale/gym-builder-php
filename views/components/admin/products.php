<main class="flex-grow pb-20">
    <div
        class="w-full h-16 bg-neutral-100 text-center flex items-center justify-center text-xl font-grotesk font-black tracking-widest">
        PRODUCTS
    </div>

    <?php 
     if(isset($_GET["edit"])){
        require "views/components/admin/subcomponents/edit.products.php";
     }else{
        require "views/components/admin/subcomponents/create.products.php";
        require "views/components/admin/subcomponents/show.products.php" ;
    }

    ?>

</main>