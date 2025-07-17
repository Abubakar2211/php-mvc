<?php

class Validator
{
    static function required($value)
    {
        return empty($value);
    }

    static function min($value, $min)
    {
        return strlen($value) < $min;
    }
    static function max($value, $max)
    {
        return strlen($value) > $max;
    }

    //  $data = [
    //     'name' => strip_tags(trim($_POST['name'])),
    //     'email' => strip_tags(trim($_POST['email'])),
    //     'password' => strip_tags(trim($_POST['password'])),
    //     'password_confirmation' => strip_tags(trim($_POST['password_confirmation']))
    // ];



    // $errors = Validator::validate($data, [
    //     'name' => ['required' => true, 'min' => 3, 'max' => 8]
    // ]);

    static function validate(array $data, array $rules)
    {
        $errors = [];

        foreach ($rules as $feild => $constrains) {
            $value = $data[$feild] ?? '';
            if (isset($constrains['required']) && $constrains['required'] && self::required($value)) {
                $errors[$feild] = ucfirst($feild) . " is required.";
                continue;
            }
            if (isset($constrains['min']) && $constrains['min'] && self::min($value, $constrains['min'])) {
                $errors[$feild] = ucfirst($feild) . " length most be less than " . $constrains['min'];
                continue;
            }
            if (isset($constrains['max']) && $constrains['max'] && self::required($value, $constrains['max'])) {
                $errors[$feild] = ucfirst($feild) . " length most be greate than" . $constrains['max'];
                continue;
            }
        }
        return $errors;
    }
}

