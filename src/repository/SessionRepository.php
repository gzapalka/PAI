<?php

require_once 'Repository.php';
require_once __DIR__ . '/../controllers/exceptions/NoSuchUserException.php';

class SessionRepository extends Repository
{
    public function logOutUser(int $userId): void
    {
        $stmt = $this->database->connect()->prepare('
                DELETE FROM session
                WHERE session."userId" = :userId;
        ');

        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }

    public function createSession(User $user, string $cookieValue): void
    {
        $stmt = $this->database->connect()->prepare('
               INSERT INTO session (token, "userId", expire)
                VALUES (:tokenValue, :userId, LOCALTIMESTAMP + interval \'20 minutes\')
        ');

        $userId = $user->getUserId();
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':tokenValue', $cookieValue);
        $stmt->execute();
    }

    /**
     * @throws NoSuchUserException
     */
    public function getLoggedUser(): int
    {
        $tokenValue = $_COOKIE["Token"];
        $stmt = $this->database->connect()->prepare('
               SELECT "userId" FROM session
                WHERE token = :tokenValue
                  AND expire > LOCALTIMESTAMP;
        ');


        $stmt->bindParam(':tokenValue', $tokenValue);
        $stmt->execute();

        $userId = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userId == false) {
            throw new NoSuchUserException();
        }

        return $userId['userId'];
    }

}