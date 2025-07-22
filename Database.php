<?php

class Database
{
    public $connection;
    public $statment;
    public function __construct()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=php_mvc;";

        $this->connection = new PDO($dsn, 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($query, $params = [])
    {

        $this->statment = $this->connection->prepare($query);
        $this->statment->execute($params);
        return $this;
    }

    public function find()
    {
        return $this->statment->fetch();
    }
    public function findOrFail()
    {
        $result = $this->statment->fetch();
        if (!$result) {
            abort();
        }
        return $result;
    }

    public function all()
    {
        return $this->statment->fetchAll();
    }
}

