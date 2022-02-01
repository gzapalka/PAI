<?php

require_once __DIR__ . '/../../controllers/exceptions/NoSuchCategoryException.php';

class InputValidator
{
    public static function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
        //email unique
    }

    public static function validatePasswordStrength(string $pwd): bool
    {
        return preg_match("^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$", $pwd);
    }

    public static function validateDecimal(string $input): float {
        return (float) $input;
    }

    /**
     * @throws Exception
     */
    public static function validateDate(string $input): DateTime {
        if($input == null){
            throw new Exception();
        }
        return new DateTime($input);
    }

    public static function validateText(string $input): string {
        //todo
        return $input;
    }

    /**
     * @throws NoSuchCategoryException
     */
    public static function validateCategory(string $input, string $userId): string {
        $repository = new CategoryRepository();
        $category = $repository->getCategory($userId, $input);
        if ($category == null) {
            throw new NoSuchCategoryException();
        }
        return $category->getCategoryId();
    }

}