<?php

namespace App\Controllers;

use PDO;
use App\Models\User;


class HomeController

{
    public function index(){


        $users = User::all();
        dd($user);

       

        
    }
}