<?php

class Router
{
    private array $routes = [];

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

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches);
                $this->callController($route['action'], $matches);
                return;
            }
        }
    }

    private function callContoller (string $action, array $params): void
    {
        
    }
}

?>