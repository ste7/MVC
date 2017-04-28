<?php

namespace App\Models;

use App\Libs\DB;

class Model{
    protected $_handler;
    
    public function __construct(){
        $this->_handler = DB::getInstance();
    }
}