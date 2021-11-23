<?php

use Decimal\Decimal;

class Category
{
    private string $categoryId;
    private string $categoryName;
    private Decimal $amountAssigned;
    private DataTime $createTime;
    private DataTime $editTime;
    private string $userId;

    /**
     * @param string $categoryId
     * @param string $categoryName
     * @param Decimal $amountAssigned
     * @param string $userId
     */
    public function __construct(string $categoryId, string $categoryName, Decimal $amountAssigned, string $userId)
    {
        $this->categoryId = $categoryId;
        $this->categoryName = $categoryName;
        $this->amountAssigned = $amountAssigned;
        $this->userId = $userId;
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