<?php

class DebtRepository extends Repository
{
    public function getDebt(string $debtId): ?Debt
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.category WHERE debtId = :debtId
        ');
        $stmt->bindParam(':debtId', $debtId);
        $stmt->execute();

        $debt = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($debt == false) {
            return null;
        }

        return Debt::retrieveConstructor(
            $debt['debt_id'],
            $debt['debt_name'],
            $debt['amount_start'],
            $debt['amount_left'],
            $debt['user_id']
        );
    }

    public function addDebt(Debt $debt)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO user_account (debt_name, amount_start, user_id) VALUES (:debtName, :amountStart, :userId)
        ');

        $userId = $debt->getUserId();
        $amountStart = $debt->getAmountStart();
        $debtName = $debt->getDebtName();
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':debtName', $debtName);
        $stmt->bindParam(':amountStart', $amountStart);
        $stmt->execute();

    }
}