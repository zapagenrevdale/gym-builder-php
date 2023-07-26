<?php

    use Core\Database;
    use Core\App;
    use Model\Email\Entity;
    use Core\Email\EmailVerification;


    $db = App::resolve(Database::class);

    $emailverify = App::resolve(EmailVerification::class);
    
    $user = $db->query('select * from users where email = ? ', [$_SESSION["user"]["email"]] )->findOrFail();

    if($user["verified"] === 1){
        header("Location: /profile");
        exit();
    }
    
    $title = "Verify Email | Gym Builder Equipment";

    $receiver = new Entity($user["email"], $user["first_name"]. ' '.$user["last_name"]);

    $otp = substr(uniqid(), -6);
    $emailverify->sendEmailVerification($receiver, $otp);

    $expirationTime = date('Y-m-d H:i:s', strtotime('+5 minutes'));

    $db->query("INSERT INTO emailotp(email, otp, expiration_time) VALUES(?, ?, ?)", [$user["email"], $otp, $expirationTime]);

    $errors = [];
    
    header("Location: /email-verification")
?>