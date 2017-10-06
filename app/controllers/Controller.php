<?php
namespace App\Controllers;

use App\Core\Parse;

class Controller{

    /*
     * view from controller
     */
    private $_view;

    /*
     * param from controller
     */
    private $_param;


    public function __construct()
    {
        $this->_view = Parse::$_view;
        $this->_param = Parse::$_param;
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
        $url = explode('/', $view);
        unset($url[count($url) - 1]);
        $implode = implode('/', $url);//view koji je pozvan

        return $implode;
    }



    public function view($view, $data = []){
        if(!isset($_GET['url'])) {
            return false;
        }

        if($this->paramExists($view)) {
            $this->getViewFromUrl($view);
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


    public function getParam(){
        return $this->_param;
    }
}