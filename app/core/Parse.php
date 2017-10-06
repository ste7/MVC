<?php
namespace App\Core;

class Parse
{
    /*
     * view from url
     */
    public static $_view;

    /*
     * param from url
     */
    public static $_param;
    
    public function __construct(){
        $this->parseUrl();
    }


    public function parseUrl(){
        if(!isset($_GET['url'])){
            return false;
        }

        $explode = explode('/', $_GET['url']);

        self::$_param = $explode[count($explode) - 1];
        self::$_view = rtrim(implode('/', $explode), self::$_param);
        self::$_view = rtrim(self::$_view, '/');
    }
}