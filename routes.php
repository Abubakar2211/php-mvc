<?php


$router->get('/', 'controllers/index-controller.php');
$router->post('/login', 'controllers/auth/login-controller.php');
$router->get('/user', 'controllers/users/index-controller.php');
$router->get('/user-create', 'controllers/users/create-controller.php');
$router->post('/user-store', 'controllers/users/store-controller.php');
$router->get('/user-edit', 'controllers/users/edit-controller.php');
$router->put('/user-update', 'controllers/users/update-controller.php');
$router->delete('/user-delete', 'controllers/users/delete-controller.php');

// return [
//     '/' => 'controllers/index-controller.php',
//     '/login' => 'controllers/auth/login-controller.php',
//     '/user' => 'controllers/users/index-controller.php',
//     '/user-create' => 'controllers/users/create-controller.php',
//     '/user-edit' => 'controllers/users/edit-controller.php',
//     '/user-delete' => 'controllers/users/delete-controller.php',
// ];