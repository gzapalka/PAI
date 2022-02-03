<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Requests/LoginRequest.php';
require_once __DIR__ . '/../repository/UserRepository.php';
require_once __DIR__ . '/../repository/CategoryRepository.php';
require_once __DIR__ . '/../models/User.php';
require_once 'exceptions/NoSuchUserException.php';
require_once 'util/InputValidator.php';
require_once 'util/SessionUtil.php';

class SecurityController extends AppController
{
    private UserRepository $userRepository;
    private CategoryRepository $categoryRepository;
    private TransactionRepository $transactionRepository;
    private SessionUtil $sessionUtil;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->categoryRepository = new CategoryRepository();
        $this->transactionRepository = new TransactionRepository();
        $this->sessionUtil = new SessionUtil();
    }

    public function log_out() {
        if (!$this->isGet()) {
            return $this->render('login');
        }
        try {
            $userId = $this->sessionUtil->getLoggedUser();
            $this->sessionUtil->logOutUser($userId);

        } catch (NoSuchUserException $e) {
        } finally {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }


    }

    public function login_user()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $pwd = $_POST["password"];
        $controller = new DefaultController();

        if (!InputValidator::validateEmail($email)) {
            $controller->displayPageWithErrorMassage("login","Incorrect email!");
            return;
        }

        $userRepository = new UserRepository();
        $user = $userRepository->getUser($email, $pwd);

        if ($user == null) {
            $controller->displayPageWithErrorMassage('login',"No such user");
            return;
        }

        try {
            $this->sessionUtil->createNewSession($user);
        } catch (Exception $e) {
            $controller->displayPageWithErrorMassage('login',"Unable to create a session");
            return;
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/budget");
    }

    public function register_user()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $name = $_POST['username'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['repeat_password'];
        $controller = new DefaultController();

         if(!$this->userRepository->isEmailUnique($email)) {
             $controller->displayPageWithErrorMassage('register',"Email already used!");
             return;
         }

        if ($password !== $confirmedPassword) {
            $controller->displayPageWithErrorMassage('register',"Pwds must match!");
            return;
        }

        $user = User::insertConstructor($name, $email, password_hash($password, PASSWORD_BCRYPT));

        $userId = $this->userRepository->addUser($user);
        $this->categoryRepository->addCategoryForNewUser($userId);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }

    public function delete_account() {
         try {
             $userId = $this->sessionUtil->getLoggedUser();
         } catch (NoSuchUserException $e) {
             $this->render('login');
             return;
         }
         $this->transactionRepository->deleteAllUserTxns($userId);
         $this->categoryRepository->deleteCategoriesByUser($userId);
         $this->userRepository->deleteUser($userId);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }


}