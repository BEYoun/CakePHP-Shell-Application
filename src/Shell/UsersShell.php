<?php
namespace App\Shell;

use Cake\Console\Shell;

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
        if ($user) {
            $this->out("Welcome to ". $user->name);
        } else {
            $this->abort('User cannot be found', 128);
        }

        // Get arbitrary text from the user.
        $color = $this->in('What color do you like?');

        // Write to stdout
        $this->out('Normal message');

        // Write to stderr
        $this->err('Error message');

        // Write to stderr and raise a stop exception
        $this->abort('Fatal error');


        // Output 2 newlines
        $this->out($this->nl(2));

        // Clear the user's screen
        $this->clear();

        // Draw a horizontal line
        $this->hr();
    }

    // another shell function
    public function heyThere($name = 'Anonymous')
    {
        $this->out('Hey there ' . $name);
    }
}
