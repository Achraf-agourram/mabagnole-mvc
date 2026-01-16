<?php
require_once __DIR__ . '/autoload.php';

$router = new Router();

$router->get('/login', 'UserController@login');
$router->excute();

?>