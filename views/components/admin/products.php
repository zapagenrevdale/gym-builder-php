<main class="flex-grow pb-20">
    <div
        class="w-full h-16 bg-neutral-100 text-center flex items-center justify-center text-xl font-grotesk font-black tracking-widest">
        PRODUCTS
    </div>
    <div class="flex justify-end px-16 py-8">
        <button id="create-product" class="primary-button primary-button-black rounded-xl px-16 font-semibold ">
            Create
        </button>
    </div>
    <div id="create-product-modal" class="w-full h-full fixed left-0 top-0 z-30 bg-neutral-800/50 hidden">
        <form action="/admin/products/" method="POST" enctype="multipart/form-data"
            class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-40 h-full w-full max-h-[720px] max-w-[720px] bg-white p-10 flex flex-col gap-4">

            <div class="flex justify-between items-start">
                <h4 class="font-bold text-xl uppercase mb-2 bg-neutral-800 text-white py-4 px-6 rounded-md">Create
                    Product</h4>
                <button id="create-product-modal-exit" class="p-2 border rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-7 h-7 text-red-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="grid grid-cols-12 gap-4">
                <div class="flex flex-col w-full gap-2 text-sm col-span-7">
                    <label for="name" class="font-medium">Name</label>
                    <input required type="text" id="name" name="name"
                        class="h-10 border rounded-md focus:border px-4 w-full" />
                </div>
                <div class="flex flex-col w-full gap-2 text-sm col-start-9 col-end-13">
                    <label for="price" class="font-medium">Price</label>
                    <input required type="number" id="price" name="price" min="0"
                        class="h-10 border rounded-md focus:border px-4 w-full" />
                </div>
                <div class="flex flex-col w-full gap-2 text-sm col-span-12">
                    <label for="description" class="font-medium">Description</label>
                    <textarea required id="description" name="description" rows="10" cols="30" maxlength="500"
                        placeholder="Enter product description here..."
                        class="p-4 border rounded-md focus:border w-full" value=""></textarea>
                </div>
                <div class="flex flex-col w-full gap-2 text-sm col-span-12">
                    <label for="productImage" class="font-medium">Product Image</label>
                    <input type="file" id="productImage" name="productImage" class="h-10  w-full" />
                </div>
                <div class="flex justify-end col-span-12">
                    <input value="Proceed" type="submit"
                        class="primary-button primary-button-black px-10 hover:scale-105 border rounded-md cursor-pointer font-semibold" />
                </div>
            </div>
        </form>
    </div>
    <article class="px-16 ">
        <table class="overflow-hidden table-fixed w-full">
            <thead class="table-head text-neutral-800 h-16 rounded-t-lg border ">
                <tr class=" overflow-hidden">
                    <th class="w-24 text-left px-4">ID</th>
                    <th class="w-32 text-left px-4">Name</th>
                    <th class="w-full text-left px-4">Description</th>
                    <th class="w-24 text-left px-4">Price</th>
                    <th class="w-24 text-left px-4">Image</th>
                    <th class="w-24 text-left px-4">Action</th>
                </tr>
            </thead>
            <tbody class="border font-grotesk text-light">
                <tr class="border">
                    <td class="px-2 border-l">1</td>
                    <td class="px-2 border-l">Treadmill</td>
                    <td class="px-2 border-l">A motorized exercise machine used for walking or running indoors.
                    </td>
                    <td class="px-2 border-l">$999</td>
                    <td class="px-2 border-l"><img src="https://scene7.samsclub.com/is/image/samsclub/0004361975332_A"
                            alt="" class="w-20 h-20"></td>
                    <td class="px-2 border-l text-sm text-center">
                        <a class="text-blue-700 cursor-pointer hover:underline underline-offset-4">Edit</a>
                        <br class="h-4">
                        <a class="text-red-700 cursor-pointer hover:underline underline-offset-4">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-2 border-l">1</td>
                    <td class="px-2 border-l">Treadmill</td>
                    <td class="px-2 border-l">A motorized exercise machine used for walking or running indoors.
                    </td>
                    <td class="px-2 border-l">$999</td>
                    <td class="px-2 border-l"><img src="https://scene7.samsclub.com/is/image/samsclub/0004361975332_A"
                            alt="" class="w-20 h-20"></td>
                    <td class="px-2 border-l text-sm text-center">
                        <a class="text-blue-700 cursor-pointer hover:underline underline-offset-4">Edit</a>
                        <br class="h-4">
                        <a class="text-red-700 cursor-pointer hover:underline underline-offset-4">Delete</a>
                    </td>
                </tr>

            </tbody>
        </table>
    </article>
</main>