<?php

namespace AurelioSoares\SimpleRouter;
class Router
{
    protected $routes = [];
    protected $currentRoute = [];

    protected function createRoute(
        string $verb,
        string $route,
        string $class,
        string $method
    ): void {
        $route = rtrim($route, "/");
        $this->routes[$verb][$route] = [
            'route' => $route,
            'class' => $class,
            'method' => $method
        ];
    }

    public function get(
        string $route, 
        string $class, 
        string $method
    ): void {
        $this->createRoute("GET", $route, $class, $method);
    }

    public function post(
        string $route, 
        string $class, 
        string $method
    ): void {
        $this->createRoute("POST", $route, $class, $method);
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        foreach ($this->routes[$method] as $route => $routeDetails) {
            if ($routeDetails['route'] === $uri) {
                $this->currentRoute = $routeDetails;
                break;
            }
        }

        if (!empty($this->currentRoute)) {
            $class = $this->currentRoute['class'];
            $method = $this->currentRoute['method'];
            return (new $class())->$method();
        }

        // Route not found
        return null;
    }
}
