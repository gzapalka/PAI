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

    public function budget()
    {
        $this->render('budget');
    }

    public function transaction()
    {
        $repository = new TransactionRepository();
        $sessionUtil = new SessionUtil();

        $userId = $sessionUtil->getLoggedUser();
        $transactions = $repository->getAllUsersTxns($userId);
        $this->render('transaction', ['transactions' => $transactions]);
    }

    public function statistic()
    {
        $this->render('statistic');
    }

    public function mailVerification()
    {
        $this->render("mailVerification");
    }

//    public function displayLoginPageWithErrorMassage(string $message){
//        $this->render('login', ['message' => $message]);
//    }

    public function displayPageWithErrorMassage(string $template,string $message){
        $this->render($template, ['message' => $message]);
    }

    public function login_user(){
        $this->render("login");
    }

}