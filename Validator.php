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
    static function max($value ,$max ){
        return strlen($value) > $max;
    }
}