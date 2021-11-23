<?php

class Debt
{
    private string $debtId;
    private string $debtName;
    private Decimal $amountStart;
    private Decimal $amountLeft;
    private DataTime $createTime;
    private DataTime $editTime;
    private string $userId;

    /**
     * @param string $debtName
     * @param Decimal $amountStart
     * @param string $userId
     */
    public function __construct(string $debtName, Decimal $amountStart, string $userId)
    {
        $this->debtName = $debtName;
        $this->amountStart = $amountStart;
        $this->userId = $userId;
    }

    /**
     * @param string $debtName
     */
    public function setDebtName(string $debtName): void
    {
        $this->debtName = $debtName;
    }

    /**
     * @param Decimal $amountLeft
     */
    public function setAmountLeft(Decimal $amountLeft): void
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
     * @return Decimal
     */
    public function getAmountStart(): Decimal
    {
        return $this->amountStart;
    }

    /**
     * @return Decimal
     */
    public function getAmountLeft(): Decimal
    {
        return $this->amountLeft;
    }

    /**
     * @return DataTime
     */
    public function getCreateTime(): DataTime
    {
        return $this->createTime;
    }

    /**
     * @return DataTime
     */
    public function getEditTime(): DataTime
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