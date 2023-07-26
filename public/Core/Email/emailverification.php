<?php

namespace Core\Email;

use Core\Email\Mailer;
use Model\Email\Content;

class EmailVerification
{
    public $emailconfig;
    public $errCode;
    public $status;

    public function __construct($emailconfig)
    {
        
        require base_path('vendor/autoload.php');
        $this->emailconfig = $emailconfig;
    }

    public function sendEmailVerification($user, $otp)
    {
        $mailer = new Mailer($this->emailconfig);
        

        $content = new Content(); // Model\Email\Content
        $content->subject = $this->emailconfig['emailverificationSubject'];
        $content->attachment = $this->emailconfig['emailverificationAttachment'];

        $htmlbody = "";
        $htmlbody = $this->emailconfig['emailverificationhtml'];
        $htmlbody[$this->emailconfig['emailverificationOtpIndex']] = (string) $otp;
        $htmlbody[$this->emailconfig['emailverificationCreatedDateIndex']] = (string) date("c");

        $content->htmlbody = implode("", $htmlbody);

        $from = $this->emailconfig['noreply']; // Model\Email\Entity
        $to = $user; // Model\Email\Entity

        $mailer->sendBasicMail($from, $to, $content);
        $this->status = $mailer->status;
        $this->errCode = $mailer->errCode;
    }

    public function sendEmailResetLink($user, $link)
    {
        $mailer = new Mailer($this->emailconfig);

        $content = new Content(); // Model\Email\Content
        $content->subject = "NO REPLY: GymbuilderPH Reset Link";

        $htmlbody = '
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <title>Password Reset</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f5f5f5;
                    margin: 0;
                    padding: 0;
                }

                .container {
                    max-width: 600px;
                    margin: 20px auto;
                    padding: 20px;
                    background-color: #fff;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    border-radius: 8px;
                }

                h1 {
                    color: #007BFF;
                }

                p {
                    color: #333;
                    line-height: 1.6;
                }

                .reset-link {
                    display: inline-block;
                    margin-top: 20px;
                    padding: 12px 24px;
                    background-color: #007BFF;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 4px;
                }

                .reset-link:hover {
                    background-color: #0056b3;
                }
            </style>
        </head>

        <body>
            <div class="container">
                <h1>Password Reset</h1>
                <p>Hello '. $user->name .',</p>
                <p>You have requested to reset your password. Click the button below to proceed:</p>
                <a class="reset-link" href="'. $link .'">Reset Password</a>
                <p>If you did not request a password reset, you can ignore this email.</p>
            </div>
        </body>

        </html>
        ';

        $content->htmlbody = $htmlbody;

        $from = $this->emailconfig['noreply']; // Model\Email\Entity
        $to = $user; // Model\Email\Entity

        $mailer->sendBasicMail($from, $to, $content);
        $this->status = $mailer->status;
        $this->errCode = $mailer->errCode;
    }

    public function sendBasicEmailVerification($user, $otp)
    {
        $mailer = new Mailer($this->emailconfig);

        $content = new Content(); // Model\Email\Content
        $content->subject = $this->emailconfig['emailverificationSubject'];
        $content->attachment = $this->emailconfig['emailverificationAttachment'];

        $htmlbody = "";
        $htmlbody = $this->emailconfig['emailverificationhtml'];
        $htmlbody[$this->emailconfig['emailverificationOtpIndex']] = (string) $otp;

        $content->htmlbody = implode("", $htmlbody);

        $from = $this->emailconfig['noreply']; // Model\Email\Entity
        $to = $user; // Model\Email\Entity

        $mailer->sendBasicMail($from, $to, $content);
        $this->status = $mailer->status;
        $this->errCode = $mailer->errCode;
    }

}