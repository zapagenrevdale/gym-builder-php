<?php
use Core\Database;
use Core\App;
$db = App::resolve(Database::class);

if(isset($_SESSION["user"])){
    if(!isset($user)){
        $user = $db->query('select * from users where email = ? ', [$_SESSION["user"]["email"]] )->findOrFail();
    }
    $carts = $db->query('select * from cart where user_id = ?', [$user["user_id"]])->get();
}


?>

<header class="sticky left-0 top-0 w-full z-20 flex justify-center bg-white/[0.97] mb-20 md:mb-0">
    <div
        class="container flex flex-col items-center justify-center shadow-md md:hidden absolute divide-y bg-white/[0.97]">
        <div class="h-16 lg:h-20 flex items-center max-w-[1536px] justify-between w-full px-4">
            <a href="/" class="font-grotesk text-2xl flex items-center gap-2 cursor-pointer">
                <img src="/images/logo.png" width="50" height="50" />
                <span class="font-light">Gym<span class="font-extrabold">Builder</span></span>
            </a>
            <button id="openModal" class="" onclick="openModal()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <button id="closeModal" class="hidden" onclick="openModal()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div id="navigation" class="hidden w-full flex items-center gap-4 p-4">
            <div class="flex flex-col gap-4 px-10 w-full">
                <?php if(!isset($_SESSION["admin"])): ?>
                <a href="/#shop"
                    class="md:hidden cursor-pointer hover:underline flex items-center gap-5 underline-offset-4 hover:bg-neutral-800 hover:text-white min-w-full p-2 rounded-md"
                    title="Shop">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                    </svg>
                    Shop
                </a>

                <?php endif; ?>

                <a href="/about"
                    class="md:hidden cursor-pointer hover:underline flex items-center gap-5 underline-offset-4 hover:bg-neutral-800 hover:text-white min-w-full p-2 rounded-md"
                    title="About">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                    About
                </a>
                <a href="/contact"
                    class="md:hidden cursor-pointer hover:underline flex items-center gap-5 underline-offset-4 hover:bg-neutral-800 hover:text-white min-w-full p-2 rounded-md"
                    title="Contact">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>
                    Contact
                </a>

                <a href="/faq"
                    class="md:hidden cursor-pointer hover:underline flex items-center gap-5 underline-offset-4 hover:bg-neutral-800 hover:text-white min-w-full p-2 rounded-md"
                    title="Contact">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>

                    FAQS
                </a>



                <?php if(!isset($_SESSION["admin"])): ?>
                <a href="<?= isset($_SESSION["user"]) ? "/profile" : "/login" ?>"
                    class="cursor-pointer  flex items-center gap-5 underline-offset-4 hover:bg-neutral-800 hover:text-white min-w-full p-2 rounded-md"
                    href="<?= isset($_SESSION["user"]) ? "/profile" : "/login" ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    Profile
                </a>

                <?php if(isset($_SESSION["user"])): ?>

                <div class="relative">
                    <a class="cursor-pointer hover:underline flex items-center gap-5 underline-offset-4 hover:bg-neutral-800 hover:text-white min-w-full p-2 rounded-md"
                        href="/cart">
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-5 w-5 ">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                            <?php if(count($carts) > 0): ?>
                            <p class="absolute -top-2 -right-2 z-20  text-red-600 font-bold text-sm rounded-full">
                                <?= count($carts) ?>
                            </p>
                            <?php endif; ?>
                        </div>
                        My Cart
                    </a>


                </div>

                <?php endif; ?>
                <?php endif; ?>
                <?php if(isset($_SESSION["admin"])): ?>
                <a href="/admin"
                    class="md:hidden cursor-pointer hover:underline flex items-center gap-5 underline-offset-4 hover:bg-neutral-800 hover:text-white min-w-full p-2 rounded-md"
                    title="Admin">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                    </svg>

                    Admin
                </a>

                <?php endif; ?>

                <?php
                    if(isset($_SESSION["user"]) || isset($_SESSION["admin"])){
                        echo '<a href="/logout" id="admin-logout" class="font-grotesk font-semibold p-2">
                                LOGOUT
                            </a>';
                    }

                ?>
            </div>
        </div>
    </div>
    <div class="hidden container md:flex items-center justify-center shadow-md">
        <div class="h-16 lg:h-20 flex items-center max-w-[1536px] justify-between w-full px-4">
            <a href="/" class="font-grotesk text-2xl flex items-center gap-2 cursor-pointer">
                <img src="/images/logo.png" width="50" height="50" />
                <span class="font-light">Gym<span class="font-extrabold">Builder</span></span>
            </a>
            <nav class="hidden md:flex items-center justify-center space-x-8 underline-offset-4">
                <?php if(!isset($_SESSION["admin"])): ?>
                <a href="/#shop" class="font-medium text-lg font-grotesk hover:underline cursor-pointer"> Shop </a>
                <?php endif; ?>
                <a href="/about" class="font-medium text-lg font-grotesk hover:underline cursor-pointer"> About </a>
                <a href="/contact" class="font-medium text-lg font-grotesk hover:underline cursor-pointer"> Contact </a>
                <a href="/faq" class="font-medium text-lg font-grotesk hover:underline cursor-pointer"> FAQS </a>
                <?= (isset($_SESSION["admin"]) ? '<a href="/admin/products" class="font-medium text-lg font-grotesk hover:underline cursor-pointer"> Admin </a>': "") ?>
            </nav>
            <div class="flex gap-4">

                <?php if(!isset($_SESSION["admin"])): ?>
                <a class="cursor-pointer" href="<?= isset($_SESSION["user"]) ? "/profile" : "/login" ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-5 w-5 text-neutral-800">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </a>


                <?php if(isset($_SESSION["user"])): ?>

                <div class="relative">
                    <a class="cursor-pointer" href="/cart">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-5 w-5 text-neutral-800">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                    </a>
                    <?php if(count($carts) > 0): ?>
                    <p class="absolute -top-2 -right-2 z-20  text-red-600 font-bold text-sm rounded-full">
                        <?= count($carts) ?>
                    </p>
                    <?php endif; ?>

                </div>

                <?php endif; ?>
                <?php endif; ?>
                <?php
                    if(isset($_SESSION["user"]) || isset($_SESSION["admin"])){
                        echo '<a href="/logout" id="admin-logout" class="font-grotesk font-semibold">
                                LOGOUT
                            </a>';
                    }

                ?>
            </div>
        </div>
    </div>
</header>

<script>
const closeModalElement = document.getElementById("closeModal");
const openModalElement = document.getElementById("openModal")
const navigationElement = document.getElementById("navigation")
let open = false;

function openModal() {
    open = !open;
    openModalElement.classList.toggle("hidden");
    closeModalElement.classList.toggle("hidden");
    navigationElement.classList.toggle("hidden");

}
</script>