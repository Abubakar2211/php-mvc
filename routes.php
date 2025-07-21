<?php

require "Route.php";

Route::get('/post/create', 'controller','index');

return [
    '/' => 'controllers/index-controller.php',
    '/login' => 'controllers/auth/login-controller.php',
    '/user' => 'controllers/users/index-controller.php',
    '/user-create' => 'controllers/users/create-controller.php',
    '/user-edit' => 'controllers/users/edit-controller.php',
    '/user-delete' => 'controllers/users/delete-controller.php',
];