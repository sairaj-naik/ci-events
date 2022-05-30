<?php

namespace App\Controllers;

class EmailController extends \CodeIgniter\Controller
{
    public function index()
    {
        $to = "sairajnaik777@gmail.com";
        $from = "sairajnaik777@gmail.com";
        $recipient = "Sairaj Naik";
        $subject = "test email";
        $body = "Hello " . $recipient . ", <br/> This is a test email";

        $email = \Config\Services::email();
        $email->setTo($to,'Test Info');
        $email->setFrom($from);
        $email->setSubject($subject);
        $email->setMessage($body);

        if($email->send())
        {
            echo "email sent successfully";
        }
        else
        {
            $errordata = $email->printDebugger(['headers']);
            print_r($errordata);
        }
    }
}