<?php

require "Validator.php";
require "Database.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $data = [
        'name' => strip_tags(trim($_POST['name'])),
        'email' => strip_tags(trim($_POST['email'])),
        'password' => strip_tags(trim($_POST['password'])),
        'password_confirmation' => strip_tags(trim($_POST['password_confirmation']))
    ];
    $rules = [
        'name' => ['required' => true, 'min' => 4, 'max' => 15],
        'email' => ['required' => true, 'min' => 4, 'max' => 15, 'email' => true],
        'password' => ['required' => true, 'min' => 4, 'max' => 15],
        'password_confirmation' => ['required' => true, 'min' => 4, 'max' => 15],
    ];

    $errors = Validator::validate($data, $rules);


    if (!isset($errors['password']) && !isset($errors['password_confirmation']) && $data['password'] != $data['password_confirmation']) {
        $errors['password'] = "Password confirmation does not match";
    }

    if (!empty($errors)) {
        view('user/create-view', ['errors' => $errors]);
    }

    $db = new Database;
    $db->query("");

    $db->query("INSERT INTO users(name,email,password) VALUES (:name , :email,:password)", [
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => $data['password']
    ]);

    header("Location:/user");
    exit;
} else {
    view('user/create-view');
}

