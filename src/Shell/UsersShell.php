<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Log\Log;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use App\Controller\Component\EmailComponent;

/**
 * Users shell command.
 */
class UsersShell extends Shell
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');

        // Load Component
        $this->Email = new EmailComponent(new ComponentRegistry());
    }

    public function main()
    {
        if (empty($this->args[0])) {
            // Use error() before CakePHP 3.2
            return $this->abort('Please enter a username.');
        }
        $user = $this->Users->findByUsername($this->args[0])->first();
        if ($user)
        {
            Log::write('debug', "Welcome to ". $user->name);
            $this->out("Welcome to ". $user->name);

        } else
        {
            Log::write('debug', 'User cannot be found');
            $this->abort('User cannot be found', 128);
        }
    }

    /**
     * Send Mail with shell command
     */
    public function mail()
    {
        $to = 'jeevan15498@gmail.com';
        $subject = 'Hi buddy, i got a message for you.';
        $message = 'Nothing much. Just test out my Email Component using PHPMailer.';
        
        $mail = $this->Email->send_mail($to, $subject, $message);
        if ($mail) {
            $this->out("Mail Successfully Sent For :: ". $to);
        } else {
            $this->out("Mail Error.");
        }
    }
}
