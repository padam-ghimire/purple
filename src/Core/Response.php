<?php

// src/Core/Response.php

namespace App\Core;

class Response
{
    protected $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function send()
    {
        header('Content-Type: text/html');
        echo $this->content;
    }
}
