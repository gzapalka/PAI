<?php


class Transaction
{
    private string $txnId;
    private float $amount;
    private string $comment;
    private DateTime $createTime;
    private DateTime $editTime;
    private string $categoryId;


    /**
     * Constructor to insert data to database.
     * @param $amount float
     * @param $comment String
     * @param $id String id of account
     * @return Transaction
     */
    public static function insertTransaction(float $amount, String $comment, String $id, DateTime $date): Transaction
    {
        $instance = new self();
        $instance->amount = $amount;
        $instance->comment = $comment;
        $instance->createTime = $date;
        $instance->categoryId = $id;

        return $instance;
    }

    /**
     * Constructor to retrieve data from database.
     * @param String $txnId
     * @param float $amount
     * @param String $txnComment
     * @param DateTime $create_time
     * @param DateTime $edit_time
     * @param String $categoryId
     * @return Transaction new instance retrieved from database
     */
    public static function retrieveConstructor(String $txnId, float $amount, String $txnComment,
                                               DateTime $create_time, DateTime $edit_time,String $categoryId): Transaction
    {
        $instance = new self();
        $instance->txnId = $txnId;
        $instance->amount = $amount;
        $instance->comment = $txnComment;
        $instance->createTime = $create_time;
        $instance->editTime = $edit_time;
        $instance->categoryId = $categoryId;

        return $instance;
    }



    /**
     * @param float $amount
     */
    public function setAmount(float $amount)
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
     * @param String $id
     */
    public function setId(string $id)
    {
        $this->txnId = $id;
    }


    /**
     * @return String
     */
    public function getTxnId(): string
    {
        return $this->txnId;
    }

    /**
     * @return float
     */
    public function getAmount(): float
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

}