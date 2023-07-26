<?php

namespace Core\Email;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mailer
{
    public $mail;
    public $status = "";
    public $errCode = 0;
    public function __construct($mailconfig)
    {
        //Load Composer's autoloader
        require base_path('vendor/autoload.php');

        //Create an instance; passing `true` enables exceptions
        $this->mail = new PHPMailer(true);

        try {
            //Server settings
            $this->mail->SMTPDebug = 0; //Enable verbose debug output
            $this->mail->isSMTP(); //Send using SMTP
            $this->mail->SMTPAuth = $mailconfig['auth'] ? true : false;
            $this->mail->SMTPAutoTLS = $mailconfig['tls'] ? true : false;
            $this->mail->Host = $mailconfig['host']; //Set the SMTP server to send through
            $this->mail->Username = $mailconfig['username']; //SMTP username
            $this->mail->Password = $mailconfig['password']; //SMTP password
            //$this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $this->mail->Port = $mailconfig['port']; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $this->mail->IsSendMail();
            $this->status = "initialized";
        } catch (Exception $e) {
            $this->status = "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
            $this->errCode = 1;
        }
    }

    public function sendBasicMail($from, $to, $content)
    {
        //try {
        //Recipients
        $this->mail->setFrom($from->address, $from->name);
        $this->mail->addAddress($to->address, $to->name); //Add a recipient

        //Attachments
        //$this->mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name

        //Content
        $this->mail->isHTML(!empty($content->htmlbody) ? true : false); //Set email format to HTML
        $this->mail->Subject = $content->subject;
        $this->mail->Body = $content->htmlbody;
        $this->mail->AltBody = $content->plainbody;

        $this->mail->send();
        $this->status = 'Message has been sent';

        //} catch (Exception $e) {
        $this->status = "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        $this->errCode = 2;
        //}
    }
}