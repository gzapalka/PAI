<?php

class User
{
    private string $userId;
    private string $userName;
    private string $email;
    private DateTime $createTime;

    /**
     * @param String $userId
     * @param String $userName
     * @param String $email
     */
    public function __construct(string $userId, string $userName, string $email)
    {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->email = $email;
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