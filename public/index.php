<?php
require_once __DIR__ . '/autoload.php';

$router = new Router();

$router->get('/', 'ArticleController@showArticles');

$router->get('/login', 'UserController@loginPage');
$router->post('/login', 'UserController@login');

$router->get('/register', 'ClientController@registerPage');
$router->post('/register', 'ClientController@register');

$router->get('/blog', 'ArticleController@showArticles');


$router->excute();

?>