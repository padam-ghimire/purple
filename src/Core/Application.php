<?php

namespace App\Core;

use Illuminate\Database\Capsule\Manager as Capsule;



class Application
{

    protected $capsule;

    public function __construct()
    {
        // Initialize Eloquent Capsule
        $this->capsule = new Capsule;
        $this->capsule->addConnection(require __DIR__ . '/../../config/database.php');
        $this->capsule->bootEloquent();

    }

    public function run()
    {

        $request = Request::capture();
     
        $response = Router::dispatch($request);

        // Ensure that a response object is returned
        if ($response == null) {
            $response = new Response('404 Not Found', 404);
        }

        // Send the response
        $response->send();
    }
}