<form action="/admin/products" method="POST">
    <div class="flex justify-end">
        <input type="text" id="operation" name="operation" hidden value="delete" />
        <input type="text" id="product_id" name="product_id" hidden value="<?= $edit_product["product_id"] ?>" />
        <input value="Delete" type="submit"
            class="primary-button text-white bg-red-700 px-11 hover:scale-105 border rounded-md cursor-pointer font-semibold" />
    </div>
</form>