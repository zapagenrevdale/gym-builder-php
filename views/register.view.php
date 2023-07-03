<?php 
    view("partials/head.php", [
        'title' => $title,
    ]);
    view("partials/header.php");
?>

<form method="POST" action="" class="container flex flex-col justify-center max-w-[600px] gap-8 w-full py-16">

    <div class="flex flex-col items-center gap-6 justify-center">
        <h1 class="text-5xl font-semibold text-center">Register</h1>
        <div class="flex items-center gap-2 justify-center mb-4">
            <a href="">Home</a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4 text-neutral-800">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>

            <a href="">Create Account</a>
        </div>
    </div>

    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <div class="flex flex-col w-full gap-2">
        <label for="firstName" class="font-medium">First Name</label>
        <input required type="text" id="firstName" name="firstName"
            class="h-14 border rounded-md focus:border px-4 w-full"
            value=<?php echo isset($_SESSION['user']["firstName"])? $_SESSION['user']["firstName"]: "";  ?>>
    </div>

    <div class="flex flex-col w-full gap-2">
        <label for="lastName" class="font-medium">Last Name</label>
        <input required type="text" id="lastName" name="lastName"
            class="h-14 border rounded-md focus:border px-4 w-full"
            value=<?php echo isset($_SESSION['user']["lastName"])? $_SESSION['user']["lastName"]: "";  ?>>
    </div>

    <div class="flex flex-col w-full gap-2">
        <label for="email" class="font-medium">Email</label>
        <input required type="email" id="email" name="email" class="h-14 border rounded-md focus:border px-4 w-full"
            value=<?php echo isset($_SESSION['user']["email"])? $_SESSION['user']["email"]: "";  ?>>
        <?php
        if( isset($_SESSION["error"]["email"]) ){
            echo '<p class="text-red-700 text-sm">'. $_SESSION["error"]["email"] .'</p>';
        }
    ?>
    </div>
    <div class="flex flex-col w-full">
        <label for="password" class="font-medium">Password</label>
        <input required type="password" id="password" name="password"
            class="h-14 border rounded-md focus:border px-4 w-full">
    </div>

    <input type="submit" value="Create Account"
        class="font-semibold primary-button hover:hover-button-black primary-button-black flex items-center justify-center rounded-md font-grotesk">

    <div class="w-full flex items-center justify-center relative h-14">
        <div class="w-full h-1 border-b"> </div>
        <div
            class="h-14 w-14 text-sm border rounded-full absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 bg-white flex items-center justify-center">
            OR
        </div>
    </div>

    <button
        class="primary-button hover:hover-button-white primary-button-white flex items-center justify-center rounded-md font-grotesk border-2 border-neutral-800 ">
        <h6 class="font-semibold">Sign in</h6>
    </button>
</form>

<?php view("partials/footer.php"); ?>