<?php
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("partials/header.php");
?>

<style>
input[name="otp"] {
    width: calc(6ch + 1em);
}
</style>

<div class="flex flex-col h-screen items-center ">
    <div class="p-12">
        <div class="flex flex-col items-center gap-6 justify-center pb-20">
            <h1 class="text-5xl font-semibold text-center">Email Verification</h1>
            <div class="flex items-center gap-2 justify-center mb-4">
                <a href="/profile">Profile</a>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 text-neutral-800">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>

                <a href="/email-verification">Email</a>
            </div>
        </div>
    </div>
    <form class="flex gap-4" action="/email-verification" method="POST">
        <input type="text" name="otp" required class="border-b-4 focus:outline-none text-2xl border-b-neutral-800"
            maxlength="6" styk />
        <button type="Submit"
            class="mt-3 primary-button text-center  primary-button-black hover:bg-neutral-800/90 flex justify-center items-center gap-4 rounded-md font-semibold">
            Verify
        </button>
    </form>
    <?= isset($errors["otp"]) ? '<p class="text-red-700 text-md font-bold pt-5">'. $errors["otp"] .'</p>' : '' ?>
</div>

<?php view("partials/footer.php"); ?>

<div class="hidden">

    <?php
        $emailverify->sendEmailVerification($receiver, $otp);
    ?>
</div>