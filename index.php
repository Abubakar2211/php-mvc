<?php

require "function.php";
require "Route.php";

$router = new Route;
require "routes.php";
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST['__method'] ?? $_SERVER['REQUEST_METHOD'];

$router->router($uri, $method);

