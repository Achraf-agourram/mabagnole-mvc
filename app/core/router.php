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
        $this->routes[$method][] = [
            "path" => $path,
            "action" => $action
        ];
    }

    public function excute (): void
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes[$method] ?? [] as $route) {
            $pattern = preg_replace('#\{[^/]+\}#', '([^/]+)', $route['path']);

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);
                $this->callController($route['action'], $matches);
                return;
            }
        }
    }

    private function callController (string $action, array $params): void
    {
        [$controller, $method] = explode("@", $action);
        $controller = "App\\Contollers\\$controller";
        $controller = new $controller();

        call_user_func_array([$controller, $method], $params);
    }
}

?>