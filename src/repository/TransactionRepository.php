<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Transaction.php';

class TransactionRepository extends Repository
{

    public function getTxn(string $txnId): ?Transaction
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.transaction WHERE transaction_id = :txnId
        ');

        $stmt->bindParam(':txnId', $txnId);
        $stmt->execute();

        $txn = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($txn == false) {
            return null;
        }

        return Transaction::retrieveConstructor(
            $txn['transaction_id'],
            $txn['amount'],
            $txn['txn_comment'],
            $txn['create_time'],
            $txn['edit_time'],
            $txn['category_id'],
            $txn['debt_id'],
        );
    }

    public function addTxn(Transaction $transaction)
    {
        $categoryId = $transaction->getCategoryId();
        $debtId = $transaction->getDebtId();
        $amountAssigned = $transaction->getAmount();
        $comment = $transaction->getComment();

            $stmt = $this->database->connect()->prepare('
            INSERT INTO user (amount, txn_comment, category_id, debt_id) 
            VALUES (:amount, :txn_comment, :category_id, :debt_id)
        ');

            $stmt->bindParam(':amount', $amountAssigned);
            $stmt->bindParam(':txn_comment', $comment);
            $stmt->bindParam(':category_id', $categoryId);
            $stmt->bindParam(':debt_id', $debtId);

        $stmt->execute();
    }

}