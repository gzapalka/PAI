<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Transaction.php';

class TransactionRepository extends Repository
{

    public function getAllUsersTxns(string $userId): ?array
    {
        $stmt = $this->database->connect()->prepare('
            select t.transaction_id, c.name, t.amount, t.create_time, t.comment from transaction t
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
                $txn['transaction_id'],
                $txn['name'],
                $txn['amount'],
                str_replace('00:00:00', '', $txn['create_time']),
                $txn['comment']
            ];
        }

        return $myList;
    }


    public function addTxn(Transaction $transaction)
    {
        $id = $transaction->getTxnId();
        $categoryId = $transaction->getCategoryId();
        $amountAssigned = $transaction->getAmount();
        $comment = $transaction->getComment();
        $date = $transaction->getCreateTime()->format('Y-m-d H:i:s');

        if ($transaction->getTxnId() == null) {
            $stmt = $this->database->connect()->prepare('
            INSERT INTO transaction (amount, comment, category_id, create_time, edit_time)
            VALUES (:amount, :comment, :category_id, :date, LOCALTIMESTAMP)
         ');
        } else {
            $stmt = $this->database->connect()->prepare('
            INSERT INTO transaction (transaction_id ,amount, comment, category_id, create_time, edit_time)
            VALUES (:txnId ,:amount, :comment, :category_id, :date, LOCALTIMESTAMP)
         ');
            $stmt->bindParam(':txnId', $id);
        }
        $stmt->bindParam(':amount', $amountAssigned);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':category_id', $categoryId);
        $stmt->bindParam(':date', $date);

        $stmt->execute();
    }

    public function deleteTxn(int $txnId)
    {

        $stmt = $this->database->connect()->prepare('
            DELETE FROM transaction WHERE transaction_id = :txnId;
        ');

        $stmt->bindParam(':txnId', $txnId);

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
    {
        ;
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

    public function getLeftMoneyByUser($userId): float
    {
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

    public function getTxnByComment(string $searchComment)
    {
        $searchComment = '%'.strtolower($searchComment).'%';
        $stmt = $this->database->connect()->prepare('
             select c.name, t.amount, t.create_time, t.comment, t.transaction_id from transaction t
                join category c on c.category_id = t.category_id
                join user_account ua on ua.user_id = c.user_id
                where LOWER(t.comment) LIKE :search
        ');

        $stmt->bindParam(':search', $searchComment, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}