<div class="flex flex-col gap-4 text-xl font-medium text-neutral-600 min-w-[200px] py-5">
    <a href="/profile" class="<?= $_SERVER["REQUEST_URI"] === "/profile"? "font-bold": ""?> hover:underline">
        Dashboard
    </a>
    <a href="/profile/address" class="<?= $_SERVER["REQUEST_URI"] === "/profile/address"? "font-bold": ""?> hover:underline">
        Address
    </a>
    <a href="/profile/orders" class="<?= $_SERVER["REQUEST_URI"] === "/profile/orders"? "font-bold": ""?> hover:underline">
        Orders
    </a>

</div>