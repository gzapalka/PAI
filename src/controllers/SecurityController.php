<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Requests/LoginRequest.php';
require_once __DIR__ . '/../repository/UserRepository.php';
require_once __DIR__ . '/../models/User.php';
require_once 'util/InputValidator.php';

class SecurityController extends AppController
{
    private UserRepository $repository;

    public function __construct()
    {
        parent::__construct();
        $this->repository = new UserRepository();
    }

    public function login_user()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $pwd = $_POST["password"];
        $controller = new DefaultController();


        if (InputValidator::validateEmail($email)) {
            $controller->displayLoginPageWithErrorMassage("Incorrect email");
        } else {
            $userRepository = new UserRepository();
            $user = $userRepository->getLoggedUser($email, $pwd);

            if ($user == null) {
                $controller->displayLoginPageWithErrorMassage("No such user");
            } else {
                $controller->displayLoginPageWithErrorMassage("You're in!");
            }
//
//            $url = "https://$_SERVER[HTTP_HOST]";
//            header("Location: $url/mailVerification");
        }
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

        $controller->displayLoginPageWithErrorMassage("Email already used!");
         if(!$this->repository->isEmailUnique($email)) {
             $controller->displayLoginPageWithErrorMassage("Email already used!");
             return;
         }

        if ($password !== $confirmedPassword) {
            $controller->displayLoginPageWithErrorMassage("Pwds must match!");
            return;
        }

        $user = User::insertConstructor($name, $email, password_hash($password, PASSWORD_BCRYPT));

        $this->repository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}