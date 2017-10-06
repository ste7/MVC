<?php
namespace App\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function getUser()
    {
        $id = $this->getParam();

        $user = new User();
        $u = $user->_handler
            ->table('users')
            ->where(['id' => $id])
            ->get()
            ->results();

        return parent::view('user/[id]', ['user' => $u]);
    }
}