<form action="/admin/users" method="POST">
    <div class="flex justify-end">
        <input type="text" name="_method" hidden value="delete" />
        <input type="text" name="user_id" hidden value="<?= $user_id ?>" />
        <input value="Delete" type="submit"
            class="primary-button text-white bg-red-700 px-11 hover:scale-105 border rounded-md cursor-pointer font-semibold" />
    </div>
</form>