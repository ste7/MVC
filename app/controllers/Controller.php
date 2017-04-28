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
        if(isset($_GET['url'])) {
            if(substr_count($view, '[') && substr_count($view, ']')) {
                if(file_exists('../app/views/' . $this->_view . '.php')) {

                    $url2 = explode('/', $view);
                    unset($url2[count($url2) - 1]);
                    $implode2 = implode('/', $url2);//view koji je pozvan
                    
                    if($implode2 === $this->_view) {
                        require_once '../app/views/' . $this->_view . '.php';
                        
                        return $this;
                    }
                }
            } elseif($_GET['url'] === $view) {
                require_once '../app/views/' . $view . '.php';
                
                return $this;
            }
        }
    }
    
    public function getParam(){
        return $this->_param;
    }
}



//                    $url = explode('/', $_GET['url']);
//                    unset($url[count($url) - 1]);
//                    $implode = implode('/', $url);//view koji je u url-u