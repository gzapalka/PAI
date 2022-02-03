<?php

require 'Routing.php';


$path = trim($_SERVER['REQUEST_URI'], '/');

$path = parse_url( $path, PHP_URL_PATH);


Router::get('', 'DefaultController');
Router::get('register', "DefaultController");
Router::get('login', "DefaultController");
Router::get('transaction', "DefaultController");
Router::get('budget', "DefaultController");
Router::get('statistic', "DefaultController");
Router::get('register_user', "DefaultController");
Router::get('login_user', "DefaultController");
Router::get("log_out", 'SecurityController');
Router::get('add_txn', "DefaultController");

Router::post('register_user', 'SecurityController');
Router::post("login_user", 'SecurityController');
Router::post("delete_account", 'SecurityController');
Router::post("add_txn", 'TransactionController');

Router::run($path);


