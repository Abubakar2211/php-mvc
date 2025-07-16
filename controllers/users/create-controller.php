<?php

require "Validator.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $data = [
        'name' => strip_tags(trim($_POST['name'])),
        'email' => strip_tags(trim($_POST['email'])),
        'password' => strip_tags(trim($_POST['password'])),
        'password_confirmation' => strip_tags(trim($_POST['password_confirmation']))
    ];

    $errors = [];

    if (Validator::required($data['name'])) {
        $errors['name'] = "Name is required";
    }

    if (Validator::min($data['name'], 3)) {
        $errors['name'] = "Name can not be less then 3 character";
    }
    if (Validator::max($data['name'],30)) {
        $errors['name'] = "Name can not be greater then 30
         character";
    dd($errors);
    if (Validator::required($data['email'])) {
        $errors['email'] = "Email is required";
    }

    if (Validator::required($data['password'])) {
        $errors['password'] = "Password is required";
    }

    if (Validator::required($data['password_confirmation'])) {
        $errors['name'] = "Password_confirmation is required";
    }
    if (!isset($errors['password']) && !isset($errors['password_confirmation']) && $data['password'] != $data['password_confirmation']) {
        $errors['password'] = "Password confirmation does not match";
    }


    if (!empty($data['name'])) {
        if (!minAndMax($data['name'], 4, 255)) {
            $errors['name'] = "Name must be between 3 to 255 character";
        }
    }
    if (!empty($data['email'])) {
        if (!minAndMax($data['email'], 4, 255)) {
            $errors['email'] = "Email must be between 3 to 255 character";
        }
    }
    if (!empty($data['password'])) {
        if (!minAndMax($data['password'], 4, 255)) {
            $errors['password'] = "Password must be between 3 to 255 character";
        }
    }
    if (!empty($data['password_confirmation'])) {
        if (!minAndMax($data['password_confirmation'], 4, 255)) {
            $errors['password_confirmation'] = "Password Confirmation must be between 3 to 255 character";
        }
    }


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
