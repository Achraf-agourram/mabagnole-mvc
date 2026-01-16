<?php

class Router
{
    private array $routes = [];

    public function get(string $path, string $action): void
    {
        $this->addRoute('GET', $path, $action);
    }

    public function post(string $path, string $action): void
    {
        $this->addRoute('POST', $path, $action);
    }

    private function addRoute (string $method, string $path, string $action): void
    {
        $this->routes[$method][$path] = $action;
    }

    public function excute(): void
{
    $method = strtoupper($_SERVER['REQUEST_METHOD']);

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = str_replace('/mabagnole-mvc', '', $uri);
    $uri = rtrim($uri, '/');

    if ($uri === '') {
        $uri = '/';
    }

    if (!isset($this->routes[$method])) {
        echo 'No routes for this method';
        return;
    }

    foreach ($this->routes[$method] as $path => $action) {

        $pattern = preg_replace('#\{[^/]+\}#', '([^/]+)', $path);
        $pattern = '#^' . $pattern . '$#';

        if (preg_match($pattern, $uri, $matches)) {
            array_shift($matches);
            $this->callController($action, $matches);
            return;
        }
    }

    echo '404 Not Found';
}


    private function callController (string $action, array $params): void
    {
        [$controller, $method] = explode("@", $action);
        $service = str_replace('Controller', 'Service', $controller);
        $repo = str_replace('Controller', 'Repository', $controller);
        
        if ($controller === 'ArticleController') {
            $controller = new $controller(new $service(new $repo(), new TagService(new TagRepository())), new TagService(new TagRepository()), new UserController(new UserService(new UserRepository())));
        }
        else $controller = new $controller(new $service(new $repo()));

        call_user_func_array([$controller, $method], $params);
    }
}

?>