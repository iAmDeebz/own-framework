<?php

namespace Classes;

class Router
{
    private array $routes;

    public function __construct(array $routes) {
        $this->routes = $routes;
    }

    public function route($url): void
    {
        foreach ($this->routes as $route => $handler) {
            $pattern = $this->buildPattern($route);
            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);
                $this->invokeControllerAction($handler, $matches);
                return;
            }
        }
        $this->handle404();
    }

    private function buildPattern($route): string
    {
        return '#^' . preg_replace('/\{(\w+)}/', '(?P<$1>[^/]+)', $route) . '$#';
    }

    private function invokeControllerAction($handler, $params): void
    {
        list($controllerName, $action) = explode('@', $handler);
        $controller = new $controllerName();
        call_user_func_array([$controller, $action], $params);
    }

    private function handle404(): void
    {
        echo "404 Not Found";
    }
}