<?php


require "function.php";
// dd($_SERVER["REQUEST_URI"]);
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

// dd($uri);
if ($uri == "/") {
    require 'form.php';
    exit;
} elseif ($uri == '/login') {
    require "login.php";
} else {
    abort();
}

