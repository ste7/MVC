<?php
namespace App\Core;


class App
{
    public function get($class, $method)
    {
        return call_user_func(array((new $class), $method));
    }
}