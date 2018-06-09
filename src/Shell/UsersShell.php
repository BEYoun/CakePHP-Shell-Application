<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Log\Log;

/**
 * Users shell command.
 */
class UsersShell extends Shell
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
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
}
