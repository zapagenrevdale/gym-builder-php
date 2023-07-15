<?php

  namespace Core;

class PaymongoAPI
{
  public $config;
  public $client;

  const POST = 'POST';
  const GET = 'GET';
  const EMPTY_BODY = "";

  public function __construct($config)
  {
    $this->client = new \GuzzleHttp\Client();
    $this->config = $config;
  }

  public function build_http_request($requestMode, $url, $body)
  {
    $response = $this->client->request($requestMode, $url, [
      'body' => $body,
      'headers' => [
        'accept' => 'application/json',
        'authorization' => "Basic " . $this->config['PassEncode'],
        'content-type' => 'application/json',
      ],
    ]);

    return $response->getBody();
  }


  public static function build_paymentintent_gcash(
    $data = [
      "userid" => "123",
      "transactionkey" => "sample",
      "amount" => 2000,
      "product" => "myproduct",
      "order" => "1 myproduct"
    ]
  ) {

    return
      [
        "data" => [
          "attributes" => [
            "amount" => $data["amount"],
            "payment_method_allowed" => [
              "gcash",
            ],
            "currency" => "PHP",
            "capture_type" => "automatic",
            "description" => $data["product"],
            "statement_descriptor" => $data["order"],
            "metadata" => [
              "userid" => $data["userid"],
              "transactionkey" => $data["transactionkey"],
            ]
          ]
        ]
      ];
  }

  public static function build_paymentmethod_gcash()
  {

    return
      [
        "data" => [
          "attributes" => [
            "type" => "gcash"

          ]
        ]
      ];
  }
  public static function build_paymentintent_attach(
    $data = [
      "method_id" => "dummy_abcde",
      "client_key" => "dummy_abcde_client_key",
      "return_url" => "localhost:80"
    ]
  ) {
    return
      [
        "data" => [
          "attributes" => [
            "payment_method" => $data["method_id"],
            "client_key" => $data["client_key"],
            "return_url" => $data["return_url"],
          ]

        ]
      ];
  }
  public static function build_webhook(
    $data = [
      "url" => "localhost:80"
    ]
  ) {
    return
      [
        "data" => [
          "attributes" => [
            "events" => [
              "payment.paid",
              "payment.failed",
            ],
            "url" => $data['url'],
          ]

        ]
      ];
  }

  public function payment_intent_create($body)
  {
    return (string) $this->build_http_request(
      PaymongoAPI::POST, $this->config['payment-intent-create-uri'],
      $body
    );
  }

  public function payment_intent_attach($paymentIntentID, $body)
  {
    return (string) $this->build_http_request(
      PaymongoAPI::POST,
      $this->config['payment-intent-create-uri'] . "/" . $paymentIntentID . "/attach",
      $body
    );
  }

  public function payment_method_list()
  {
    return (string) $this->build_http_request(
      PaymongoAPI::GET,
      $this->config['payment-method-list-uri'],
      ""
    );
  }

  public function payment_method_create($body)
  {
    return (string) $this->build_http_request(
      PaymongoAPI::POST,
      $this->config['payment-method-create-uri'],
      $body
    );
  }

  public function payment_method_retrieve($paymentMethodID)
  {
    return (string) $this->build_http_request(
      PaymongoAPI::GET,
      $this->config['payment-method-retrieve-uri'] . "/" . $paymentMethodID,
      ""
    );
  }




  public function payment_webhook_create($body)
  {
    return (string) $this->build_http_request(
      PaymongoAPI::POST,
      $this->config['payment-webhook-create-uri'],
      $body
    );
  }



  public function payment_webhook_list()
  {
    return (string) $this->build_http_request(
      PaymongoAPI::POST,
      $$this->config['payment-webhook-create-uri'],
      ""
    );
  }


  public function payment_webhook_enable($webhookID)
  {
    return (string) $this->build_http_request(
      PaymongoAPI::POST,
      $this->config['payment-webhook-create-uri'] . "/" . $webhookID . "/enable",
      $webhookID
    );
  }


  public function payment_webhook_disable($webhookID)
  {
    return (string) $this->build_http_request(
      PaymongoAPI::POST,
      $this->config['payment-webhook-create-uri'] . "/" . $webhookID . "/disable",
      $webhookID
    );
  }


  public function payment_source_retrieve($sourceID)
  {
    return (string) $this->build_http_request(
      PaymongoAPI::GET,
      $this->config['payment-source-retrieve-uri'] . "/" . $sourceID,
      ""
    );
  }



}

?>