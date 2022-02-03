<?php

require_once __DIR__.'/../../../Database.php';

class DatabaseUtil
{
    private static DatabaseUtil $instance;
    private $connection;
    private Database  $database;

    private function __construct() {
        $this->database = new Database();
        $this->connection = $this->database->connect();
    }

    public static function getInstance() {
        if(!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function connect(){
        return self::$instance->connection;
    }
}