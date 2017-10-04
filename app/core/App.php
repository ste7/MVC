<?php
namespace App\Core;


class App
{
    public function get($class, $method)
    {
        call_user_func(array((new $class), $method));
    }
}