<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/TransactionRepository.php';
require_once __DIR__ . '/../models/User.php';
require_once 'util/InputValidator.php';
require_once 'util/SessionUtil.php';

class TransactionController extends AppController
{
    private TransactionRepository $repository;
    private SessionUtil $sessionUtil;

    public function __construct()
    {
        parent::__construct();
        $this->repository = new TransactionRepository();
        $this->sessionUtil = new SessionUtil();
    }

    public function add_txn()
    {
        if (!$this->isPost()) {
            return $this->render('transaction');
        }

        $controller = new DefaultController();

        try {
            $userId = $this->sessionUtil->getLoggedUser();
        } catch (NoSuchUserException $e) {
            $this->render('login');
            return;
        }

//        try {
            $amount = InputValidator::validateDecimal($_POST["amount"]);
            $date = InputValidator::validateDate($_POST["date"]);
            $comment = InputValidator::validateText($_POST["comment"]);
            $categoryId = InputValidator::validateCategory($_POST["category"], $userId);
//        } catch (Exception $e) {
//            $controller->displayPageWithErrorMassage('transaction',"Bad input");
//            return;
//        }
        $txn = Transaction::insertTransaction($amount, $comment, TxnTypes::ACCOUNT,  $categoryId, $date);
        $this->repository->addTxn($txn);

        $this->render('transaction');
    }
}