<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die;
}

function abort($code = 404)
{
    require "views/response/{$code}.php";
    die;
}

function view(string $path, array $params = [])
{
    $file = "views/{$path}.php";

    if (!file_exists($file)) {
        echo "View Not Found . {$file}";
        die;
    }
    extract($params);
    require $file;
    exit;
}