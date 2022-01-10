<?php


require 'Routing.php';


$path = trim($_SERVER['REQUEST_URI'], '/');

$path = parse_url( $path, PHP_URL_PATH);


Router::get('', 'DefaultController');
Router::get('register', 'DefaultController');
Router::get('mailVerification', 'DefaultController');
Router::post("login_user", 'SecurityController');
Router::run($path);
