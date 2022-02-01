<?php


class Debt
{
    private string $debtId;
    private string $debtName;
    private float $amountStart;
    private float $amountLeft;
    private DateTime $createTime;
    private DateTime $editTime;
    private string $userId;


    /**
     * Constructor to insert data to database.
     * @param string $debtName
     * @param float $amountStart
     * @param string $userId
     * @return Debt new instance to insert to database
     */
    public static function insertConstructor(string $debtName, float $amountStart, string $userId): Debt
    {
        $instance = new self();
        $instance->debtName = $debtName;
        $instance->amountStart = $amountStart;
        $instance->userId = $userId;
        return $instance;
    }

    /**
     * Constructor to retrieve data from database.
     * @param string $debtId
     * @param string $debtName
     * @param float $amountStart
     * @param float $amountLeft
     * @param string $userId
     * @return Debt new instance retrieved from database
     */
    public static function retrieveConstructor(
        string  $debtId, string $debtName, float $amountStart,
        float $amountLeft, string $userId): Debt
    {
        $instance = new self();
        $instance->debtId = $debtId;
        $instance->debtName = $debtName;
        $instance->amountStart = $amountStart;
        $instance->amountLeft = $amountLeft;
        $instance->userId = $userId;
        return $instance;
    }

    /**
     * @param string $debtName
     */
    public function setDebtName(string $debtName): void
    {
        $this->debtName = $debtName;
    }

    /**
     * @param float $amountLeft
     */
    public function setAmountLeft(float $amountLeft): void
    {
        $this->amountLeft = $amountLeft;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getDebtId(): string
    {
        return $this->debtId;
    }

    /**
     * @return string
     */
    public function getDebtName(): string
    {
        return $this->debtName;
    }

    /**
     * @return float
     */
    public function getAmountStart(): float
    {
        return $this->amountStart;
    }

    /**
     * @return float
     */
    public function getAmountLeft(): float
    {
        return $this->amountLeft;
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
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }


}