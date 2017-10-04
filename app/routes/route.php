<?php

use App\Core\App;
use App\Core\Parse;

$parse = new Parse('url');
$app = new App();



$app->get('App\Controllers\HomeController', 'getHome');
$app->get('App\Controllers\UserController', 'getUser');