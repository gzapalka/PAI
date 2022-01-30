<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/User.php';

class UserRepository extends Repository
{
    public function getLoggedUser(string $email, string $pwd): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT pwd.user_id, username, email, create_time
            FROM pai."user" JOIN pai."pwd" ON "user".user_id = pwd.user_id
            WHERE pai."user".email LIKE :email AND pai.pwd.pwd_hash LIKE :pwd;
        ');

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pwd', $pwd);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return User::retrieveConstructor(
            $user['userId'],
            $user['email'],
            $user['username'],
            $user['create_time'],
        );
    }

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.user WHERE email = :email
        ');
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return User::retrieveConstructor(
            $user['userId'],
            $user['email'],
            $user['username'],
            $user['create_time'],
        );
    }

    public
    function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO pwd (username, email) VALUES (:username, :email)
        ');

        $stmt = $this->database->connect()->prepare('
            INSERT INTO user (username, email) VALUES (:username, :email)
        ');

        $email = $user->getEmail();
        $userName = $user->getUserName();
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $userName);
        $stmt->execute();

    }
}