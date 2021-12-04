<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Category.php';

class CategoryRepository extends Repository
{
    public function getCategory(User $user, string $name): ?Category
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.category WHERE user_id = :user_id AND name =:name
        ');
        $userId = $user->getUserId();
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();

        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($category == false) {
            return null;
        }

        return Category::retrieveConstructor(
            $category['categoryId'],
            $category['name'],
            $category['amountAssigned'],
            $category['amountSpent'],
            $category['amountLast'],
            $category['userId'],
        );
    }

    public function addCategory(Category $category)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO user (name, amount_assigned, user_id) VALUES (:categoryName, :amountAssigned, :userId)
        ');

        $userId = $category->getUserId();
        $decimal = $category->getAmountSpent();
        $categoryName = $category->getCategoryName();
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':categoryName', $categoryName);
        $stmt->bindParam(':amountSpent', $decimal);
        $stmt->execute();

    }
}