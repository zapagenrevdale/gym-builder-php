<?php

use Model\Email\Entity;

$noreply = new Entity('noreply@gymbuilderph.com', 'Noreply GymbuilderPH');

$mailconfig = [
    'domain' => 'gymbuilderph.com',
    //'host' => 'smtpout.secureserver.net',
    //'host' => 'relay-hosting.secureserver.net',
    //this host is working in godaddy
    'host' => 'localhost',
    'username' => 'noreply@gymbuilderph.com',
    'password' => 'Thegymbuilder',
    'auth' => false,
    'tls' => false,
    'port' => '25',
    // 'port' => '465',
    'noreply' => $noreply,
    'emailverificationSubject' => "NO REPLY: GymbuilderPH Verification",
    'emailverificationAttachment' => '',
    'emailverificationOtpIndex' => 1,
    'emailverificationCreatedDateIndex' => 3,
    'emailverificationhtml' => [
        "<p>Your OTP is <b>",
        "******",
        "</b></p><p>Created at ",
        "Date",
        "<p>",
    ],
    'emailVerifyCallbackUrl' => 'https://gymbuilderph.com/email/verifyotp.php',
];

return $mailconfig;

?>