<?php
namespace App\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function getHome()
    {
        $user = new User();

        $users = $user->_handler
            ->table('users')
            ->get()
            ->results();

        return parent::view('home', ['users' => $users]);
    }

    public function getTest()
    {
        $user = new User();

        $users = $user->_handler
            ->table('users')
            ->where(['id' => 1])
            ->get();

        return parent::view('test/user', ['user' => $users->first()]);
    }
}