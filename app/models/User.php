<?php

namespace App\Models;


class User extends Model{

    private $_table = 'users';
    
    public function user($id){
        return $this->_handler
            ->table($this->_table)
            ->where(['id' => $id])
            ->get();
    }

    public function users(){
        return $this->_handler->table($this->_table)->get();
    }
}