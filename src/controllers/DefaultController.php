<?php

require_once 'AppController.php';

class DefaultController extends AppController
{

    public function login()
    {
        $this->render('login');
    }

    public function register()
    {
        $this->render('register');
    }

    public function mailVerification()
    {
        $this->render("mailVerification");
    }

    public function displayLoginPageWithErrorMassage(string $message){
        $this->render('login', ['message' => $message]);
    }

}