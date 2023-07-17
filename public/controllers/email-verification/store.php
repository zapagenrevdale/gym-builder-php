<?php

    use Core\Database;
    use Core\App;


    $db = App::resolve(Database::class);

    $user = $db->query('select * from users where email = ? ', [$_SESSION["user"]["email"]] )->findOrFail();
    
    $title = "Verify Email | Gym Builder Equipment";

    $validotp = $db->query("SELECT * FROM emailotp WHERE email = ? AND otp = ? AND ? <= expiration_time", [
        $user["email"],
        $_POST["otp"],
        date('Y-m-d H:i:s'),
    ])->get();

    if(empty($validotp)){
        view("email-verification/index.php", [
            "title" => $title,
            "errors" =>  ["otp" => "Invalid OTP"],
        ]);
        exit();
    }

    $db->query("UPDATE users SET verified = 1 WHERE user_id = ?", [
        $user["user_id"]
    ]);

    header("Location: /profile")
    
 
?>