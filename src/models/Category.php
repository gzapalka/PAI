<?php

use Decimal\Decimal;

class Category
{
    private string $categoryId;
    private string $categoryName;
    private Decimal $amountAssigned;
    private Decimal $amountSpent;
    private Decimal $amountLast;
    private DateTime $createTime;
    private DateTime $editTime;
    private string $userId;

    /**
     * Constructor to insert data to database.
     * @param string $categoryName
     * @param Decimal $amountAssigned
     * @param string $userId
     * @return Category new instance to insert to database
     */
    public static function insertConstructor(string $categoryName, Decimal $amountAssigned,string $userId): Category
    {
        $instance = new self();
        $instance->categoryName = $categoryName;
        $instance->amountAssigned = $amountAssigned;
        $instance->userId = $userId;
        return $instance;
    }

    /**
     * Constructor to retrieve data from database.
     * @param string $categoryId
     * @param string $categoryName
     * @param Decimal $amountAssigned
     * @param Decimal $amountSpent
     * @param Decimal $amountLast
     * @param string $userId
     * @return Category new instance retrieved from database
     */
    public static function retrieveConstructor(
        string $categoryId, string $categoryName, Decimal $amountAssigned,
        Decimal $amountSpent, Decimal $amountLast, string $userId): Category
    {
        $instance = new self();
        $instance->categoryId = $categoryId;
        $instance->categoryName = $categoryName;
        $instance->amountAssigned = $amountAssigned;
        $instance->amountSpent = $amountSpent;
        $instance->amountLast = $amountLast;
        $instance->userId = $userId;
        return $instance;
    }


    /**
     * @return Decimal
     */
    public function getAmountSpent(): Decimal
    {
        return $this->amountSpent;
    }

    /**
     * @param Decimal $amountSpent
     */
    public function setAmountSpent(Decimal $amountSpent): void
    {
        $this->amountSpent = $amountSpent;
    }

    /**
     * @return Decimal
     */
    public function getAmountLast(): Decimal
    {
        return $this->amountLast;
    }

    /**
     * @param Decimal $amountLast
     */
    public function setAmountLast(Decimal $amountLast): void
    {
        $this->amountLast = $amountLast;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
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
    public function getCategoryId(): string
    {
        return $this->categoryId;
    }

    /**
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->categoryName;
    }

    /**
     * @param string $categoryName
     */
    public function setCategoryName(string $categoryName)
    {
        $this->categoryName = $categoryName;
    }

    /**
     * @return Decimal
     */
    public function getAmountAssigned(): Decimal
    {
        return $this->amountAssigned;
    }

    /**
     * @param Decimal $amountAssigned
     */
    public function setAmountAssigned(Decimal $amountAssigned)
    {
        $this->amountAssigned = $amountAssigned;
    }


}