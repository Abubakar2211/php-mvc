<?php

require "Validator.php";
require "Database.php";

try {

    $id = $_POST['id'];
    $db = new Database();
    $user = $db->query("SELECT * FROM users WHERE id = :id", ['id' => $id])->findOrFail();

    $data = [
        'name' => strip_tags(trim($_POST['name'])),
        'email' => strip_tags(trim($_POST['email'])),
        'password' => strip_tags(trim($_POST['password'])),
        'password_confirmation' => strip_tags(trim($_POST['password_confirmation']))
    ];
    if (empty($data['password'])) {
        $data['password'] = $user['password'];
        $data['password_confirmation'] = $user['password'];
    }
    $rules = [
        'name' => ['required' => true, 'min' => 4, 'max' => 15],
        'email' => ['required' => true, 'min' => 4, 'max' => 50, 'email' => true],
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

    $db->query("UPDATE users SET name = :name , email=:email , password = :password WHERE id = :id", [
        'id' => $id,
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => !empty($data['password']) ? $data['password'] : $user['password']
    ]);
    header("Location:/user");
    exit;

} catch (Exception $e) {
    echo $e->getMessage();
    die;
}





