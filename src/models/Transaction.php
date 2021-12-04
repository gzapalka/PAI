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
     * Constructor to insert data to database.
     * @param $amount Decimal
     * @param $comment String
     * @param $txnType TxnTypes determine if txn is debt or account type
     * @param $id String id of account or debt
     * @return Transaction
     */
    public static function insertTransaction(Decimal $amount, String $comment, TxnTypes $txnType, String $id): Transaction
    {
        $instance = new self();
        $instance->amount = $amount;
        $instance->comment = $comment;

        if ($txnType == TxnTypes::ACCOUNT){
            $instance->categoryId = $id;
        } elseif ($txnType == TxnTypes::DEBT) {
            $instance->debtId = $id;
        }
        return $instance;
    }

    /**
     * Constructor to retrieve data from database.
     * @param String $txnId
     * @param Decimal $amount
     * @param String $txnComment
     * @param DateTime $create_time
     * @param DateTime $edit_time
     * @param String $categoryId
     * @param String $debtId
     * @return Transaction new instance retrieved from database
     */
    public static function retrieveConstructor(String $txnId, Decimal $amount, String $txnComment,
                                               DateTime $create_time, DateTime $edit_time,String $categoryId,
                                               String $debtId): Transaction
    {
        $instance = new self();
        $instance->txnId = $txnId;
        $instance->amount = $amount;
        $instance->comment = $txnComment;
        $instance->createTime = $create_time;
        $instance->editTime = $edit_time;
        $instance->categoryId = $categoryId;
        $instance->debtId = $debtId;

        return $instance;
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