<?php

use App\Core\App;
use App\Core\Parse;

new Parse();
$app = new App();



$app->get('App\Controllers\HomeController', 'getHome');
$app->get('App\Controllers\HomeController', 'getTest');
$app->get('App\Controllers\UserController', 'getUser');