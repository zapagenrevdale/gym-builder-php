<?php


$config = [
    'database' => [
        'host' => 'localhost',
        'port' => 3307,
        'dbname' => 'gym_builder',
        'charset' => 'utf8mb4'
    ],
    "user" => "root",
    "password" => "",
    'payment-intent-create-uri' => "https://api.paymongo.com/v1/payment_intents",
    'payment-intent-attach-uri' => "https://api.paymongo.com/v1/payment_intents",
    'payment-method-list-uri' => "https://api.paymongo.com/v1/merchants/capabilities/payment_methods",
    'payment-method-create-uri' => "https://api.paymongo.com/v1/payment_methods",
    'payment-method-retrieve-uri' => "https://api.paymongo.com/v1/payment_methods",
    'payment-webhook-create-uri' => "https://api.paymongo.com/v1/webhooks",
    'payment-source-retrieve-uri' => "https://api.paymongo.com/v1/sources",
    'username' => "pk_test_LwC7nLLvuikPyqyADUD4NbUr",
    'secretKey' => "sk_test_nKDCnSfbE2SttXTBVx6gbpHW",
    'return-uri' => "http://gymbuilderph.com/controller/payment_api/return.php",
    'webhook-uri' => "http://gymbuilderph.com/controller/payment_api/webhook2.php",
];

$config['userPassEncode'] = base64_encode($config['username'] . ":" . $config['secretKey']);
$config['PassEncode'] = base64_encode($config['secretKey'] . ":");


return $config;


?>