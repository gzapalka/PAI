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

    private function mapTxnToString($userTxn){


    }

    public function addTxn(Transaction $transaction)
    {
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

    public function deleteAllUserTxns(int $userId) {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM transaction WHERE category_id in 
                (SELECT category_id FROM category where user_id = :userId);
        ');

        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }

}