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

        try {
            $amount = InputValidator::validateDecimal($_POST["amount"]);
            $date = InputValidator::validateDate($_POST["date"]);
            $comment = InputValidator::validateText($_POST["comment"]);
            $categoryId = InputValidator::validateCategory($_POST["category"], $userId);
        } catch (Exception $e) {
            $controller->displayPageWithErrorMassage('transaction',"Bad input");
            return;
        }
        $txn = Transaction::insertTransaction($amount, $comment, $categoryId, $date);
        $this->repository->addTxn($txn);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/transaction");
    }

    public function edit_txn()
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

        try {
            $id = (int) $_POST["id"];
            $amount = InputValidator::validateDecimal($_POST["amount"]);
            $date = InputValidator::validateDate($_POST["date"]);
            $comment = InputValidator::validateText($_POST["comment"]);
            $categoryId = InputValidator::validateCategory($_POST["category"], $userId);
        } catch (Exception $e) {
            $controller->displayPageWithErrorMassage('transaction',"Bad input");
            return;
        }
        $this->repository->deleteTxn($id);
        $txn = Transaction::insertTransaction($amount, $comment, $categoryId, $date);
        $txn->setId($id);
        $this->repository->addTxn($txn);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/transaction");
    }

    public function delete_txn(int $txnId){
        $this->repository->deleteTxn($txnId);

    }

    public function search()
    {
        $content_type = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : "";

        if($content_type === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            header('Content_type: application/json');
            http_response_code(200);
            echo json_encode($this->repository->getTxnByComment($decoded['search']));
        }

    }



}