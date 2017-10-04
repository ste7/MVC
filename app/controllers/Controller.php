<?php
namespace App\Controllers;

use App\Core\Parse;

class Controller{
    
    private $_view;
    
    private $_param;


    public function __construct()
    {
        $this->_view = Parse::$_view;
        $this->_param = Parse::$_param;
    }


    public function view($view, $data = []){
        if(!isset($_GET['url'])) {
            return false;
        }
        if($this->paramExists($view)) {
            if($this->viewExists($this->_view)) {
                if($this->getViewFromUrl($view) === $this->_view) {
                    require_once '../app/views/' . $this->_view . '.php';

                    return true;
                }
            } else{
                return false;
            }
        } elseif($this->viewExists($view)){
            if($_GET['url'] === $view){
                require_once '../app/views/' . $view . '.php';

                return true;
            } else{
                return false;
            }
        }
    }

    private function viewExists($view){
        if(file_exists('../app/views/' . $view . '.php')){
            return true;
        }
        return false;
    }

    private function paramExists($view){
        if(substr_count($view, '[') && substr_count($view, ']')){
            return true;
        }
        return false;
    }

    private function getViewFromUrl($view){
        $url2 = explode('/', $view);
        unset($url2[count($url2) - 1]);
        $implode2 = implode('/', $url2);//view koji je pozvan

        return $implode2;
    }
    
    public function getParam(){
        return $this->_param;
    }
}