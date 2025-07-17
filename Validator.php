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
            if (isset($constrains['max']) && $constrains['max'] && self::max($value, $constrains['max'])) {
                $errors[$feild] = ucfirst($feild) . " length most be greate than " . $constrains['max'];
                continue;
            }
            if (isset($constrains['email']) && $constrains['email'] && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email must be a valid email address.";
                continue;
            }
        }
        return $errors;
    }
}

