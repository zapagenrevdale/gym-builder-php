
<div class="flex flex-col gap-4 font-lg font-medium text-neutral-600 min-w-[200px]">
    <a href="/profile" class="<?= $_SERVER["REQUEST_URI"] === "/profile"? "font-bold": ""?>">
        Dashboard
    </a>
    <a href="/profile/address" class="<?= $_SERVER["REQUEST_URI"] === "/profile/address"? "font-bold": ""?>">
        Address
    </a>
    <a href="/orders" class="<?= $_SERVER["REQUEST_URI"] === "/orders"? "font-bold": ""?>">
        Orders
    </a>

</div>