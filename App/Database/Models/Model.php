<?php

namespace App\Database\Models;

use App\Database\Connect;

abstract class Model
{

    protected $connect;

    public function __construct(){
        $this->connect = Connect::connect();
    }
}
