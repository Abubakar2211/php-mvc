<?php
require "Database.php";

try {

    $db = new Database();
    $users = $db->query("SELECT * FROM users")->fetchAll();
    view('user/index-view', [
        'users' => $users
    ]);
} catch (Exception $e) {
    echo "Connection Failed :" . $e->getMessage();
    die;
}