<?php

class Database
{
    public $connection;
    public function __construct()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=php_mvc;";

        $this->connection = new PDO($dsn, 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($query, $params = [])
    {

        $statment = $this->connection->prepare($query);
        $statment->execute($params);
        return $statment;
    }
}

