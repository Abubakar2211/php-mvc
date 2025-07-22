<?php

require "Database.php";

$id = $_GET['id'];

$db = new Database;
$user = $db->query("SELECT * FROM users WHERE id=:id", ['id' => $id])->findOrFail();

view("user/edit-view", ['user' => $user]);
