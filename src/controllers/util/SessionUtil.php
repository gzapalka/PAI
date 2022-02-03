<?php

require_once __DIR__ . '/../../repository/SessionRepository.php';

class SessionUtil
{
    private SessionRepository $repository;

    public function __construct()
    {
        $this->repository = new SessionRepository();
    }

    /**
     * @throws Exception
     */
    public function createNewSession(User $user)
    {
        $this->logOutUser($user->getUserId());
        $cookie_name = "Token";
        $cookie_value = bin2hex(random_bytes(16));
        setcookie($cookie_name, $cookie_value, time() + 1200);

        $this->repository->createSession($user, $cookie_value);
    }

    public function logOutUser(int $user)
    {
        setcookie("Token", "", time() - 3600);
        $this->repository->logOutUser($user);
    }

    /**
     * @throws NoSuchUserException
     */
    public function getLoggedUser(): int
    {
        return $this->repository->getLoggedUser();
    }
}