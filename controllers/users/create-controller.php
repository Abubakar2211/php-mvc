<?php

require "Validator.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $data = [
        'name' => strip_tags(trim($_POST['name'])),
        'email' => strip_tags(trim($_POST['email'])),
        'password' => strip_tags(trim($_POST['password'])),
        'password_confirmation' => strip_tags(trim($_POST['password_confirmation']))
    ];
    $rules = [
        'name' => ['required' => true , 'min' => 4]
    ];

    $errors = Validator::validate($data, $rules);

    dd($errors);

    if (!isset($errors['password']) && !isset($errors['password_confirmation']) && $data['password'] != $data['password_confirmation']) {
        $errors['password'] = "Password confirmation does not match";
    }

    // Name
    if (Validator::required($data['name'])) {
        $errors['name'] = "Name is required";
    } else if (Validator::min($data['name'], 4)) {
        $errors['name'] = "Name length less than 4";
    } else if (Validator::max($data['name'], 15)) {
        $errors['name'] = "Name length Greater than 15";
    }
    // Email
    if (Validator::required($data['email'])) {
        $errors['email'] = "Email is required";
    } else if (Validator::min($data['email'], 4)) {
        $errors['email'] = "Email length less than 4";
    } else if (Validator::max($data['email'], 15)) {
        $errors['email'] = "Email length Greater than 15";
    }
    // Password
    if (Validator::required($data['password'])) {
        $errors['password'] = "Password is required";
    } else if (Validator::min($data['password'], 4)) {
        $errors['password'] = "Password length less than 4";
    } else if (Validator::max($data['password'], 15)) {
        $errors['password'] = "Password length Greater than 15";
    }
    // Password Confirmation
    if (Validator::required($data['password_confirmation'])) {
        $errors['password_confirmation'] = "Password Confirmation is required";
    } else if (Validator::min($data['password_confirmation'], 4)) {
        $errors['password_confirmation'] = "Password Confirmation length less than 4";
    } else if (Validator::max($data['password_confirmation'], 15)) {
        $errors['password_confirmation'] = "Password Confirmation length Greater than 15";
    }
    dd($errors);

    if (!empty($errors)) {
        view('user/create-view', ['errors' => $errors]);
    }
    header("Location:/user", ['message' => 'User Created Success']);
} else {
    view('user/create-view');
}
function minAndMax(string $value, int $min, int $max)
{
    return strlen($value) > $min && strlen($value) < $max;
}
