<?php

namespace App\Console\Commands;

class StartCommand
{
    protected static $defaultName = 'myapp:start';

    public function run()
    {
        // Implement logic to start your application here
        echo "Starting myapp on port 8003...\n";
        
        // Execute PHP's built-in web server
        exec('php -S localhost:8003 -t public');
    }
}