<?php

require_once 'AppController.php';

class DefaultController extends AppController
{
    private $transactionRepository;
    private $sessionUtil;
    private $categoryRepository;

    public function __construct()
    {
        $this->transactionRepository = new TransactionRepository();
        $this->categoryRepository = new CategoryRepository();
        $this->sessionUtil = new SessionUtil();
    }

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
        try {
            $userId = $this->sessionUtil->getLoggedUser();
            $left = $this->transactionRepository->getLeftMoneyByUser($userId);
            $home = $this->categoryRepository->budgetsPerCategories(Categories::HOME, $userId);
            $transport = $this->categoryRepository->budgetsPerCategories(Categories::TRANSPORT, $userId);
            $fun = $this->categoryRepository->budgetsPerCategories(Categories::FUN, $userId);
            $education = $this->categoryRepository->budgetsPerCategories(Categories::EDUCATION, $userId);
            $this->render('budget', ['homeCategoryBudgets' => $home,
                'transportCategoryBudgets' => $transport,
                'funCategoryBudgets' => $fun,
                'educationCategoryBudgets' => $education,
                'moneyToSpent' => $left]);

        } catch (NoSuchUserException $e) {
            $this->render('login');
        }

    }

    public function transaction()
    {
        try {
            $userId = $this->sessionUtil->getLoggedUser();
            $transactions = $this->transactionRepository->getAllUsersTxns($userId);
            $this->render('transaction', ['transactions' => $transactions]);
        } catch (NoSuchUserException $e) {
            $this->render('login');
        }

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

    public function displayPageWithErrorMassage(string $template, string $message)
    {
        $this->render($template, ['message' => $message]);
    }

    public function login_user()
    {
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }

    public function add_txn()
    {
        $this->render('transaction');
    }

}