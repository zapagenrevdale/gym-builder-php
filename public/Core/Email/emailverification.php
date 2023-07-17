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