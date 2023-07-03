<?php 
    view("partials/head.php", [
        'title' => $title,
    ]);

    view("admin/partials/header.php");
?>

<div class="container flex flex-col justify-center items-center p-20">
    <div class="flex flex-col xl:flex-row rounded-lg shadow-xl overflow-hidden">
        <?php view("admin/partials/sidebar.php"); ?>

        <main class="flex-grow pb-20">
            <div
                class="w-full h-16  bg-neutral-100 text-center flex items-center justify-center text-xl font-grotesk font-black tracking-widest">
                USERS
            </div>

            <form action="/admin/users/create" method="GET" class="flex justify-end px-16 py-8">
                <input
                    class="primary-button primary-button-black  hover:hover-button-black rounded-xl px-16 font-semibold cursor-pointer"
                    value="Create" type="submit" />
            </form>

            <article class="px-16 ">
                <table class="overflow-hidden table-fixed w-full">
                    <thead class="table-head text-neutral-800 h-16 rounded-t-lg border ">
                        <tr class=" overflow-hidden">
                            <th class="w-16 text-left px-4">ID</th>
                            <th class="w-44 text-left px-4">First Name</th>
                            <th class="w-44 text-left px-4">Last Name</th>
                            <th class="min-w-[200px] w-full text-left px-4">Email</th>
                            <th class="w-28 text-left px-4">Admin</th>
                            <th class="w-28 text-left px-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border text-light ">
                        <?php 
                            foreach($users as $user){
                            echo '<tr class="border h-12">
                                        <td class="px-2 border-l">' . $user["user_id"] . '</td>
                                        <td class="px-2 border-l">' . $user["first_name"] .'</td>
                                        <td class="px-2 border-l">' . $user["last_name"] .'</td>
                                        <td class="px-2 border-l">' . $user["email"] .'</td>
                                        <td class="px-2 border-l">' . ($user["admin"] === 0? "NO" : "YES") .'</td>
                                        <td class="px-2 border-l text-sm text-center">
                                            <a href="/admin/users/edit?user_id='. $user["user_id"] .'" class="text-blue-700 cursor-pointer hover:underline underline-offset-4">Edit</a>
                                        </td>
                                    </tr>'; 
                            }
                        ?>
                    </tbody>
                </table>
            </article>
        </main>
    </div>
</div>

<script src="/js/admin.js">
</script>
<?php view("partials/footer.php") ?>