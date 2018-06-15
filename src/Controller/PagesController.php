<?php
namespace App\Controller;

class PagesController extends AppController
{
    public $components = array("Email");

    public function index()
    {
        $to = 'jeevan15498@gmail.com';
        $subject = 'Hi buddy, i got a message for you.';
        $message = 'Nothing much. Just test out my Email Component using PHPMailer.';
        
        try {
            $mail = $this->Email->send_mail($to, $subject, $message);
            print_r($mail);
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        exit;
    }
}
