<?php

require_once __DIR__ . '/../../repository/SessionRepository.php';

class SessionUtil
{
    private SessionRepository $repository;

    public function __construct()
    {
        $this->repository = new SessionRepository();
    }

    public function logOutUser(User $user)
    {
        setcookie("Token", "", time() - 3600);
        $this->repository->logOutUser($user);
    }

    /**
     * @throws Exception
     */
    public function createNewSession(User $user)
    {
        $this->logOutUser($user);
        $cookie_name = "Token";
        $cookie_value = bin2hex(random_bytes(16));
        setcookie($cookie_name, $cookie_value, 1200);

        $this->repository->createSession($user, $cookie_value);
    }

    public function getLoggedUser(User $user): string {
        return $this->getLoggedUser();
    }
}