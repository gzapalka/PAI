<?php

class InputValidator
{
    public static function validateEmail(string $email): bool
    {
        return !filter_var($email, FILTER_VALIDATE_EMAIL);
        //email unique
    }

    public static function validatePasswordStrength(string $pwd): bool
    {
        return preg_match("^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$", $pwd);
    }

}