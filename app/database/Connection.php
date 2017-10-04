<?php

namespace App\Database;

use \PDO;

class Connection extends PDO
{
    private $_handler;

    private static $_instance = null;


    public function __construct(){
        try{
            $this->_handler = parent::__construct('mysql:host='.config('host').';dbname='.config('dbname'), config('user'), config('pass'));
            parent::setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getInstance(){
        if(!self::$_instance){
            self::$_instance = new Connection();
        }
        return self::$_instance;
    }
}