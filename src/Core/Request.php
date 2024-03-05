<?php

namespace App\Core;

class Request
{
    public static function capture()
    {
        // Capture and parse the incoming HTTP request
        return new self();
    }

    public function getUri()
    {
        return $_SERVER['REQUEST_URI'];
    }
}
