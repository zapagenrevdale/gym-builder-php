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
                TUTORIALS
            </div>

            <form action="/admin/tutorials/create" method="GET" class="flex justify-end px-16 py-8">
                <input
                    class="primary-button primary-button-black  hover:hover-button-black rounded-xl px-16 font-semibold cursor-pointer"
                    value="Create" type="submit" />

            </form>

            <article class="px-16 ">
                <table class="overflow-hidden table-fixed w-full">
                    <thead class="table-head text-neutral-800 h-16 rounded-t-lg border ">
                        <tr class=" overflow-hidden">
                            <th class="w-16 text-left px-4">ID</th>
                            <th class="w-24 text-left px-4">Prd ID</th>
                            <th class="w-24 text-left px-4">Title</th>
                            <th class="w-full text-left px-4">Content</th>
                            <th class="w-40 text-left px-4">Video Link</th>
                            <th class="w-24 text-left px-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border text-light h-16">
                        <?php 
                            foreach($tutorials as $tutorial){
                            echo '<tr class="border">
                                        <td class="px-2 border-l">' . $tutorial["tutorial_id"] . '</td>
                                        <td class="px-2 border-l">' . $tutorial["product_id"] .'</td>
                                        <td class="px-2 border-l">' . $tutorial["title"] .'</td>
                                        <td class="px-2 border-l">' . $tutorial["content"] .'</td>
                                        <td class="px-2 border-l ">
                                            <a href="' . $tutorial["video_link"] .'" target="_blank" class="flex items-center gap-2 text-blue-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 010 1.971l-11.54 6.347a1.125 1.125 0 01-1.667-.985V5.653z" />
                                            </svg>
                                            Play Video
                                          </a>
                                            
                                        </td>
                                        <td class="px-2 border-l text-sm text-center">
                                            <a href="/admin/tutorials/edit?tutorial_id='. $tutorial["tutorial_id"] .'" class="text-blue-700 cursor-pointer hover:underline underline-offset-4">Edit</a>
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