<?php

require "Database.php";

try {
    $id = $_POST['id'];
    $db = new Database();
    $db->query("SELECT * FROM users where id = :id", ['id' => $id])->findOrFail();
    $db->query("DELETE FROM users where id = :id", ['id' => $id]);
    header("location:/user");
    exit;

} catch (Exception $e) {
    echo $e->getMessage();
    die;
}
