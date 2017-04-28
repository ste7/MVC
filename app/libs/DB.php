<?php

namespace App\Libs;
use \PDO;

class DB extends PDO{
    private $_handler;
    
    private $_table;

    private $_query;

    private $_where;

    private $_fields = [];

    private $_result;

    private static $_instance = null;

    public function __construct(){
        try{
            $this->_handler = new PDO('mysql:host='.config('host').';dbname='.config('dbname'), config('user'), config('pass'));
            $this->_handler->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getInstance(){
        if(!self::$_instance){
            self::$_instance = new DB();
        }
        return self::$_instance;
    }
    

    public function table($table){
        $this->_table = $table;
        return $this;
    }

    public function where($fields = []){
        $this->_fields = $fields;
        $i = 0;
        foreach($fields as $key=>$value){
            if($i > 0){
                $this->_where .= "AND ";
            }
            $this->_where .= "{$key} = :$key ";
            $i++;
        }
        return $this;
    }
    
    public function get(){
        $this->_query = "SELECT * FROM {$this->_table}";
        if($this->_where){
            $this->_query .= " WHERE {$this->_where}";
        }
        $stm = $this->_handler->prepare($this->_query);
        
        foreach($this->_fields as $key=>$value){
            $stm->bindValue($key, $value);
        }
        $stm->execute();
        $this->_result = $stm->fetchAll(PDO::FETCH_OBJ);
        
        return $this;
    }

    public function create($fields = []){
        $i = 0;
        $keys = "";
        $values = "";
        foreach($fields as $key=>$value){
            if($i > 0){
                $keys .= ", ";
                $values .= ", ";
            }
            $keys .= "{$key}";
            $values .= ":$key";
            $i++;
        }
        $this->_query = "INSERT INTO {$this->_table} ($keys) VALUES ($values)";

        $stm = $this->_handler->prepare($this->_query);
        foreach($fields as $key=>$value){
            $stm->bindValue($key, $value);
        }
        $stm->execute();
        
        return $this;
    }

    public function update($fields = []){
        $i = 0;
        $keys = "";
        foreach($fields as $key=>$value){
            if($i > 0){
                $keys .= ", ";
            }
            $keys .= "{$key} = :$key";
            $i++;
        }
        $this->_query = "UPDATE {$this->_table} SET {$keys} WHERE {$this->_where}";
        $stm = $this->_handler->prepare($this->_query);
        foreach($fields as $key=>$value){
            $stm->bindValue($key, $value);
        }
        foreach($this->_fields as $key=>$value){
            $stm->bindValue($key, $value);
        }
        $stm->execute();

        return $this;
    }
    
    public function delete(){
        $this->_query = "DELETE FROM {$this->_table} WHERE {$this->_where}";
        $stm = $this->_handler->prepare($this->_query);
        foreach($this->_fields as $key=>$value){
            $stm->bindValue($key, $value);
        }
        $stm->execute();
        
        return $this;
    }
    
    public function results(){
        return $this->_result ? $this->_result : false;
    }
    
    public function first(){
        return $this->_result ? $this->_result[0] : false;
    }

    public function last(){
        return $this->_result ? $this->_result[count($this->_result) - 1] : false;
    }
}