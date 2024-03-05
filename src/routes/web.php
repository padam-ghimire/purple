<?php


use App\Core\Router;
use App\Controllers\HomeController;

Router::get('/hi', 'HomeController@index');



