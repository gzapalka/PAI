<?php

class User
{
    private string $userId;
    private string $userName;
    private string $email;
    private DateTime $createTime;

    /**
     * Constructor to insert data to database.
     * @param String $userName the username of user
     * @param String $email the email of user
     * @return User new instance to insert to database
     */
    public static function insertConstructor(string $userName, string $email): User
    {
        $instance = new self();
        $instance->userName = $userName;
        $instance->email = $email;
        return $instance;
    }

    /**
     * Constructor to retrieved data from database.
     * @param String $userId the id of user
     * @param String $userName the username of user
     * @param String $email the email of user
     * @return User new instance retrieved from database
     */
    public static function retrieveConstructor(string $userId, string $userName, string $email, DateTime $createTime): User
    {
        $instance = new self();
        $instance->userId = $userId;
        $instance->userName = $userName;
        $instance->email = $email;
        $instance->createTime = $createTime;
        return $instance;
    }

    /**
     * @return String
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @return String
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param String $userName
     */
    public function setUserName(string $userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return String
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return DateTime
     */
    public function getCreateTime(): DateTime
    {
        return $this->createTime;
    }

}