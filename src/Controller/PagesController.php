<?php
namespace App\Controller;
 
use App\Controller\AppController;
use Cake\Console\ShellDispatcher;

class PagesController extends AppController
{
    public $components = array("Email");

    public function index()
    {
        echo "<h1>CakePHP Shell Application</h1>";
        exit;
    }

    public function mail()
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

    /**
     * Run shell command
     */
    public function run($username = null)
    {
        $shell = new ShellDispatcher();
        $output = $shell->run(['cake', 'users', 'jeevan']); // [pass arguments]
        // $output = $shell->run(['cake', 'users', $username]); // [pass arguments]
        // debug($output);

        if ($output === 0) {
            echo "Shell Command execute";
        } else {
            echo "Failure form shell command";
        }

        exit;
    }
}
