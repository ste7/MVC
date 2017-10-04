<?php

namespace App\Models;

use App\Database\DB;

class Model
{
    public $_handler;
    
    public function __construct(){
        $this->_handler = new DB();
    }
}