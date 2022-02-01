<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Category.php';

class CategoryRepository extends Repository
{
    const defaultCategories = ["Rent", "Water", "Energy", "Groceries", "Internet",
        "Car", "Fuel", "Bus Ticket", "Netflix", "Dinning Out", "Clubbing", "Gaming", "School Fees"];
    public function getCategory(int $userId, string $name): ?Category
    {
        $stmt = $this->database->connect()->prepare('
            SELECT user_id, category_id, name, amount_assigned, amount_spent, amount_last
            FROM category WHERE user_id = :user_id AND name =:name
        ');

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();

        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($category == false) {
            return null;
        }

        return Category::retrieveConstructor(
            $category['category_id'],
            $category['name'],
            $category['amount_assigned'],
            $category['amount_spent'],
            $category['amount_last'],
            $category['user_id'],
        );
    }

    public function addCategory(Category $category)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO category (name, amount_assigned, user_id, amount_spent, amount_last)
             VALUES (:categoryName, :amountAssigned, :userId, :amountSpent, :amountLast)
        ');

        $userId = $category->getUserId();
        $decimal = $category->getAmountSpent();
        $categoryName = $category->getCategoryName();
        $amountSpent = $category->getAmountSpent();
        $amountLast = $category->getAmountLast();
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':categoryName', $categoryName);
        $stmt->bindParam(':amountAssigned', $decimal);
        $stmt->bindParam(':amountSpent', $amountSpent);
        $stmt->bindParam(':amountLast', $amountLast);
        $stmt->execute();

    }

    public function addCategoryForNewUser(int $userId) {
       foreach (self::defaultCategories as $categoryName){
           $category = Category::insertConstructor($categoryName, 0.00, $userId);
           $this->addCategory($category);
       }
    }

    public function deleteCategoriesByUser(int $userId) {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM category WHERE user_id = :userId;
        ');

        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }
}