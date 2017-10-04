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
}