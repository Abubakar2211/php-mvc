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
        'name' => ['required' => true, 'min' => 4, 'max' => 15],
        'email' => ['required' => true, 'min' => 4, 'max' => 15 , 'email' => true],
        'password' => ['required' => true, 'min' => 4, 'max' => 15],
        'password_confirmation' => ['required' => true, 'min' => 4, 'max' => 15],
    ];

    $errors = Validator::validate($data, $rules);

    dd($errors);

    if (!isset($errors['password']) && !isset($errors['password_confirmation']) && $data['password'] != $data['password_confirmation']) {
        $errors['password'] = "Password confirmation does not match";
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
