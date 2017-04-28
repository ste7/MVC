<?php
namespace App\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function getHome(){
        $id = $this->getParam();
        $user = new User();
        $username = $user->user($id);
        
        return parent::view('home/[id]', ['username' => $username]);
    }
    
    public function home()
    {
        $user = new User();

        return parent::view('home', $user->users());
    }

    public function getAbout()
    {
        return parent::view('about', ['name' => 'ona']);
    }
}