<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email, string $pwd): ?User
    {
        $stmt = $this->database->connect()->prepare('
                SELECT user_id, username, email, create_time, pwd_hash
                FROM user_account JOIN pwd ON user_account.pwd_id = pwd.pwd_id
                WHERE user_account.email = :email;
        ');

        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        if (!password_verify($pwd, $user['pwd_hash'])) {
            return null;
        }

        return User::retrieveConstructor(
            $user['user_id'],
            $user['email'],
            $user['username'],
            $user['create_time']
        );
    }

    public function deleteUser(int $userId) {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM session WHERE "userId" = :user_id;
        ');
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare('
            DELETE FROM user_account WHERE user_id = :user_id;
        ');
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
    }

    public function addUser(User $user): int
    {
        $connection = $this->database->connect();
        $stmt = $connection->prepare('
            INSERT INTO pwd (pwd_hash) VALUES (:pwd_hash)
        ');

        $pwd_hash = $user->getPassword();
        $stmt->bindParam(':pwd_hash', $pwd_hash);
        $stmt->execute();

        $stmt = $connection->prepare('
            INSERT INTO user_account (username, email, "pwd_id") VALUES (:username, :email, :pwd_id)
        ');

        $lastId = $connection->lastInsertId();
        $email = $user->getEmail();
        $userName = $user->getUserName();
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $userName);
        $stmt->bindParam(':pwd_id', $lastId);
        $stmt->execute();

        return $connection->lastInsertId();
    }

    public function isEmailUnique(string $email): bool {
        $connection = $this->database->connect();
        $stmt = $connection->prepare('
            SELECT * FROM user_account WHERE email = :email;
        ');

        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return true;
        }

        return false;
    }
}