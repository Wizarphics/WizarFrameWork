<?php

namespace app\configs;

use wizarphics\wizarframework\configs\Email as ConfigsEmail;

class Email extends ConfigsEmail
{
    public $userAgent = 'WizarFramework';

    public function __construct()
    {
        parent::__construct();

        $this->fromEmail = 'wizarframework@gmail.com';
        $this->SMTPHost = 'smtp.mailtrap.io';
        $this->SMTPPort = 2525;
        $this->SMTPUser = '31cf7c857cf3d7';
        $this->SMTPPass = 'd2cdd77a9f91ea';
        $this->protocol = 'smtp';
        $this->SMTPCrypto = 'tls';
        $this->CRLF = "\r\n";
        $this->newline = "\r\n";
    }
}
