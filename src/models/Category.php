<?php


class Category
{
    private string $categoryId;
    private string $categoryName;
    private float $amountAssigned;
    private float $amountSpent;
    private float $amountLast;
    private DateTime $createTime;
    private DateTime $editTime;
    private string $userId;

    /**
     * Constructor to insert data to database.
     * @param string $categoryName
     * @param float $amountAssigned
     * @param string $userId
     * @return Category new instance to insert to database
     */
    public static function insertConstructor(string $categoryName, float $amountAssigned,string $userId): Category
    {
        $instance = new self();
        $instance->categoryName = $categoryName;
        $instance->amountAssigned = $amountAssigned;
        $instance->userId = $userId;
        $instance->amountLast = 0.00;
        $instance->amountSpent = 0.00;
        return $instance;
    }

    /**
     * Constructor to retrieve data from database.
     * @param string $categoryId
     * @param string $categoryName
     * @param float $amountAssigned
     * @param float $amountSpent
     * @param float $amountLast
     * @param string $userId
     * @return Category new instance retrieved from database
     */
    public static function retrieveConstructor(
        string $categoryId, string $categoryName, float $amountAssigned,
        float $amountSpent, float $amountLast, string $userId): Category
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
     * @return float
     */
    public function getAmountSpent(): float
    {
        return $this->amountSpent;
    }

    /**
     * @param float $amountSpent
     */
    public function setAmountSpent(float $amountSpent): void
    {
        $this->amountSpent = $amountSpent;
    }

    /**
     * @return float
     */
    public function getAmountLast(): float
    {
        return $this->amountLast;
    }

    /**
     * @param float $amountLast
     */
    public function setAmountLast(float $amountLast): void
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
     * @return float
     */
    public function getAmountAssigned(): float
    {
        return $this->amountAssigned;
    }

    /**
     * @param float $amountAssigned
     */
    public function setAmountAssigned(float $amountAssigned)
    {
        $this->amountAssigned = $amountAssigned;
    }


}