<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = [
        'name' => strip_tags(trim($_POST['name'])),
        'email' => strip_tags(trim($_POST['email'])),
        'password' => strip_tags(trim($_POST['password'])),
        'password_confirmation' => strip_tags(trim($_POST['password_confirmation']))
    ];
    $errors = [];

    foreach ($data as $key => $value) {
        if (empty($value)) {
            $errors[$key] = ucfirst($key) . " is required";
        }
    }

    if (!isset($errors['password']) && !isset($errors['password_confirmation']) && $data['password'] != $data['password_confirmation']) {
        $errors['password'] = "Password confirmation does not match";

    }
} else {
    view('user/create-view');
}