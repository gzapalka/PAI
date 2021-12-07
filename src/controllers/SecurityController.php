<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Requests/LoginRequest.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class SecurityController extends AppController
{

    public function login_user()
    {
        $email = $_POST["email"];
        $pwd = $_POST["password"];
        $controller = new DefaultController();

        if (InputValidator::validateEmail($email)) {
            $controller->displayLoginPageWithErrorMassage("Incorrect email");
        }
        else {
            $user = new LoginRequest($_POST["email"], $_POST["password"]);
            $url = "https://$_SERVER[HTTP_HOST]";
            header("Location: $url/mailVerification");
        }
        die();
    }

    public function register_user()
    {
        $url = "https://$_SERVER[HTTP_HOST]";
        header("Location: $url/register");
        die();
    }
}