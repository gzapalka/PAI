<?php

use Decimal\Decimal;

class Transaction
{
    private string $txnId;
    private Decimal $amount;
    private string $comment;
    private DateTime $createTime;
    private DateTime $editTime;
    private string $categoryId;
    private string $debtId;

    /**
     * @param $txnId String
     * @param $amount Decimal
     * @param $comment String
     * @param $txnType TxnTypes determine if txn is debt or account type
     * @param $id String id of account or debt
     */
    public function __construct(String $txnId, Decimal $amount, String $comment, TxnTypes $txnType, String $id)
    {
        $this->txnId = $txnId;
        $this->amount = $amount;
        $this->comment = $comment;

        if ($txnType == TxnTypes::ACCOUNT){
            $this->categoryId = $id;
        } elseif ($txnType == TxnTypes::DEBT) {
            $this->debtId = $id;
        }

    }

    /**
     * @param Decimal $amount
     */
    public function setAmount(Decimal $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param String $comment
     */
    public function setComment(string $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @param String $categoryId
     */
    public function setCategoryId(string $categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @param String $debtId
     */
    public function setDebtId(string $debtId)
    {
        $this->debtId = $debtId;
    }


    /**
     * @return String
     */
    public function getTxnId(): string
    {
        return $this->txnId;
    }

    /**
     * @return Decimal
     */
    public function getAmount(): Decimal
    {
        return $this->amount;
    }

    /**
     * @return String
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @return DateTime
     */
    public function getCreateTime(): DateTime
    {
        return $this->createTime;
    }

    /**
     * @return DateTime
     */
    public function getEditTime(): DateTime
    {
        return $this->editTime;
    }

    /**
     * @return String
     */
    public function getCategoryId(): string
    {
        return $this->categoryId;
    }

    /**
     * @return String
     */
    public function getDebtId(): string
    {
        return $this->debtId;
    }



}