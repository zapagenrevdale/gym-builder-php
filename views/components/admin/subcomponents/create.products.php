<div class="flex justify-end px-16 py-8">
    <button id="create-product" class="primary-button primary-button-black rounded-xl px-16 font-semibold ">
        Create
    </button>
</div>

<div id="create-product-modal"
    class="w-full h-full fixed left-0 top-0 z-30 bg-neutral-800/50 <?= isset($errors) && $_SERVER['REQUEST_METHOD'] === 'POST'? "": "hidden" ?>">
    <div
        class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-40 h-full w-full max-h-[720px] max-w-[720px] bg-white p-10 flex flex-col gap-4">

        <div class="flex justify-between items-start">
            <h4 class="font-bold text-xl uppercase mb-2 bg-neutral-800 text-white py-4 px-6 rounded-md">Create
                Product</h4>
            <button id="ed-product-modal-exit" class="p-2 border rounded-full"
                onclick='window.location.href = "/admin/products"'>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-7 h-7 text-red-700">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form class="grid grid-cols-12 gap-4" action="/admin/products" method="POST" enctype="multipart/form-data">
            <input type="text" id="operation" name="operation" hidden value="create" />
            <div class="flex flex-col w-full gap-2 text-sm col-span-7">
                <label for="name" class="font-medium">Name</label>
                <input required type="text" id="name" name="name"
                    class="h-10 border rounded-md focus:border px-4 w-full"
                    value="<?= isset($_POST['name'])? $_POST['name']: ""  ?>" />
                <?= isset($errors["name"]) ? '<p class="text-red-700 text-sm">'. $errors["name"] .'</p>' : '' ?>
            </div>
            <div class="flex flex-col w-full gap-2 text-sm col-start-9 col-end-13">
                <label for="price" class="font-medium">Price</label>
                <input required type="number" id="price" name="price" min="0" step="2"
                    class="h-10 border rounded-md focus:border px-4 w-full"
                    value="<?= isset($_POST['price'])? $_POST['price']: ""  ?>" />
                <?= isset($errors["price"]) ? '<p class="text-red-700 text-sm">'. $errors["price"] .'</p>' : '' ?>
            </div>
            <div class="flex flex-col w-full gap-2 text-sm col-span-12">
                <label for="description" class="font-medium">Description</label>
                <textarea required id="description" name="description" rows="10" cols="30" maxlength="1000"
                    placeholder="Enter product description here..."
                    class="p-4 border rounded-md focus:border w-full"><?= isset($_POST['description'])? $_POST['description']: "" ?></textarea>
                <?= isset($errors["description"]) ? '<p class="text-red-700 text-sm">'. $errors["description"] .'</p>' : '' ?>
            </div>
            <div class="flex flex-col w-full gap-2 text-sm col-span-12">
                <label for="productImage" class="font-medium">Product Image</label>
                <input required type="file" id="productImage" name="productImage" class="h-10  w-full" />
                <?= isset($errors["productImage"]) ? '<p class="text-red-700 text-sm">'. $errors["productImage"] .'</p>' : '' ?>
            </div>
            <div class="flex justify-end col-span-12">
                <input value="Proceed" type="submit"
                    class="primary-button primary-button-black px-10 hover:scale-105 border rounded-md cursor-pointer font-semibold" />

            </div>
        </form>
    </div>
</div>