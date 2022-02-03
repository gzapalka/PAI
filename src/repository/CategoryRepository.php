<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Categories.php';
require_once __DIR__ . '/../controllers/util/DatabaseUtil.php';

class CategoryRepository extends Repository
{
    const defaultCategories = ["Rent", "Water", "Energy", "Groceries", "Internet",
        "Car", "Fuel", "Bus Ticket", "Netflix", "Dinning Out", "Clubbing", "Gaming", "School Fees"];
    const homeCategories = ["Rent", "Water", "Energy", "Groceries", "Internet"];
    const transportCategories = [ "Car", "Fuel", "Bus Ticket"];
    const funCategories = ["Netflix", "Dinning Out", "Clubbing", "Gaming"];
    const educationCategories = ["School Fees"];


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

    private function getBudgetByName(int $userId,string $name): ?array {
        $stmt = $this->database->connect()->prepare('
            SELECT category_id, amount_assigned FROM category WHERE user_id = :user_id AND name = :name
        ');

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();

        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($category == false) {
            return null;
        }
        $transactionRepository = new TransactionRepository();
        $assigned = $category['amount_assigned'] == null ? 0.0 : (float) $category['amount_assigned'];
        $assign =  $assigned + $transactionRepository->getEarnByCategory($category['category_id']);
        $spent =  $transactionRepository->getSpentByCategory($category['category_id']);
        $left = $assign - $spent;
        return [
            $name,
           $assign,
            $spent,
            $left < 0 ? 0: $left,
            $left > 0 ? round( ($spent * 100)/$left, 0) : 0.00
        ];
    }

    public function budgetsPerCategories(int $category, int $userId): ?array {
        $budgets = [];
        if($category == Categories::HOME) {
           $categories = self::homeCategories;
        } elseif ($category == Categories::TRANSPORT){
            $categories = self::transportCategories;
        } elseif ($category == Categories::FUN){
            $categories = self::funCategories;
        } elseif ($category == Categories::EDUCATION){
            $categories = self::educationCategories;
        } else {
            return $budgets;
        }

        foreach ($categories as $item) {
            $budgets[] = $this->getBudgetByName($userId, $item);
        }

        return $budgets;
    }


}