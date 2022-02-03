<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Transaction.php';

class TransactionRepository extends Repository
{

    public function getAllUsersTxns(string $userId): ?array
    {
        $stmt = $this->database->connect()->prepare('
            select c.name, t.amount, t.create_time, t.comment from transaction t
                join category c on c.category_id = t.category_id
                join user_account ua on ua.user_id = c.user_id
                where c.user_id = :userId;
        ');

        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $txns = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($txns == false) {
            return null;
        }

        $myList = [];
        foreach ($txns as $txn) {
            $myList[] = [
                $txn['name'],
                $txn['amount'],
                str_replace('00:00:00', '', $txn['create_time']),
                $txn['comment']
            ];
        }

        return $myList;
    }



    public function addTxn(Transaction $transaction)
    {;
        $categoryId = $transaction->getCategoryId();
        $debtId = 0; //$transaction->getDebtId();
        $amountAssigned = $transaction->getAmount();
        $comment = $transaction->getComment();
        $date = $transaction->getCreateTime()->format('Y-m-d H:i:s');

        $stmt = $this->database->connect()->prepare('
            INSERT INTO transaction (amount, comment, category_id, debt_debt_id, create_time, edit_time)
            VALUES (:amount, :comment, :category_id, :debt_id, :date, LOCALTIMESTAMP)
        ');

        $stmt->bindParam(':amount', $amountAssigned);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':category_id', $categoryId);
        $stmt->bindParam(':debt_id', $debtId);
        $stmt->bindParam(':date', $date);

        $stmt->execute();
    }

    public function deleteAllUserTxns(int $userId)
    {

        $stmt = $this->database->connect()->prepare('
            DELETE FROM transaction WHERE category_id in 
                (SELECT category_id FROM category where user_id = :userId);
        ');

        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }

    public function getLeftByCategory($categoryId): float
    {
        $spent = $this->getSpentByCategory($categoryId);
        $assign = $this->getAssignedByCategory($categoryId);
        return $assign - $spent;
    }

    public function getSpentByCategory($categoryId)
    {;
        $stmt = $this->database->connect()->prepare('
             SELECT sum(amount) FROM transaction
                WHERE category_id = :categoryId AND amount < 0;
        ');

        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->execute();

        $spent = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($spent == false || $spent["sum"] == null) {
            return 0.0;
        }

        return ((float)$spent['sum']) * -1.0;
    }

    public function getAssignedByCategory($categoryId): float
    {
        $stmt = $this->database->connect()->prepare('
             SELECT sum(amount_assigned) FROM category
                WHERE category_id = :categoryId;
        ');

        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->execute();

        $assigned = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($assigned == false || $assigned['sum']) {
            return 0.00;
        }

        return $assigned['sum'] + $this->getEarnByCategory($categoryId);
    }

    public function getEarnByCategory($categoryId): float
    {
        $stmt = $this->database->connect()->prepare('
             SELECT sum(amount) FROM transaction
                WHERE category_id = :categoryId AND amount > 0;
        ');

        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->execute();

        $earn = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($earn == false || $earn['sum'] == null) {
            return 0.00;
        }

        return $earn['sum'];
    }

    public function getLeftMoneyByUser($userId): float {
        $stmt = $this->database->connect()->prepare('
             select sum(t.amount) from transaction t
                join category c on c.category_id = t.category_id
                join user_account ua on ua.user_id = c.user_id
                where c.user_id = :userId;
        ');

        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $left = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($left == false || $left['sum'] == null || (float)$left['sum'] < 0) {
            return 0.00;
        }

        return $left['sum'];
    }

}