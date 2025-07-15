<?php

$servername = "localhost";
$username = "root";
$database = "php-mvc";

try {
    $dsn = "mysql:host=localhost;port=3306;dbname=php_mvc;";

    $db = new PDO($dsn, 'root', '', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $users = $db->query("SELECT * FROM users")->fetchAll();

    view('user/index-view', [
        'users' => $users
    ]);
} catch (Exception $e) {
    echo "Connection Failed :" . $e->getMessage();
    die;
}