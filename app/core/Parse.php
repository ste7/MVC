<?php
namespace App\Core;

class Parse
{
    public static $_view;
    
    public static $_param;
    
    public function __construct($url = ''){
        $this->parseUrl($url);
    }


    public function parseUrl($url){
        if(isset($_GET[$url])){
            $explode = explode('/', $_GET[$url]);

            self::$_param = $explode[count($explode) - 1];
            self::$_view = rtrim(implode('/', $explode), self::$_param);
            self::$_view = rtrim(self::$_view, '/');
        }
    }
}