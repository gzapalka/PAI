<?php

require_once 'AppController.php';
require_once __DIR__ . '/../controllers/StatisticController.php';

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
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }

    }

    public function transaction()
    {
        try {
            $userId = $this->sessionUtil->getLoggedUser();
            $left = $this->transactionRepository->getLeftMoneyByUser($userId);
            $transactions = $this->transactionRepository->getAllUsersTxns($userId);
            $this->render('transaction', ['transactions' => $transactions,'moneyToSpent' => $left]);
        } catch (NoSuchUserException $e) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }

    }

    public function statistic()
    {
        try {
        $userId = $this->sessionUtil->getLoggedUser();
        $stats = new StatisticController();
        $left = $this->transactionRepository->getLeftMoneyByUser($userId);
        $expendituresPerCategory = $stats->getExpendituresPerCategory();
        $incomeVsExpenditure = $stats->getIncomeVsExpenditures();
        $expenditures_per_month = $stats->getExpendituresPerMonth();
        $this->render('statistic', ['E_PER_M' => $expenditures_per_month,
            'I_VS_E' => $incomeVsExpenditure,
            'E_PER_C' => $expendituresPerCategory,
            'moneyToSpent' => $left]);
        } catch (NoSuchUserException $e) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
    }

    public function mailVerification()
    {
        $this->render("mailVerification");
    }

    public function displayPageWithErrorMassage(string $template, string $message)
    {
        $this->render($template, ['message' => $message]);
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/$template");
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

    public function delete_txn()
    {
        try {
            $userId = $this->sessionUtil->getLoggedUser();
            $this->transactionRepository->deleteTxn($_GET["id"]);

        } catch (NoSuchUserException $e) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/transaction");
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/transaction");
    }

}