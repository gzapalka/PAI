<?php

require_once __DIR__ . '/../controllers/util/DatabaseUtil.php';

class Repository {
    protected $database;

    public function __construct()
    {
        $this->database = DatabaseUtil::getInstance();
    }
}