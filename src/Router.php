<?php

namespace AurelioSoares\SimpleRouter;

class Router
{
    //Path to the classes that will handle the request
    protected $path;
    protected $routes;
    protected function setPath(string $path): void 
    {
        $this->path = $path;
    }

    protected function createRoute(
        string $verb,
        string $route,
        string $class,
        string $method,
        string $name
    ): void {
        $route = rtrim($route, "/");
        $this->routes[$name] = $route;
    }

    public function get(
        string $route, 
        string $class, 
        string $method
    ): void {
        $this->createRoute("GET", $route, $class, $method, $name = $route);
    }

    public function post(
        string $route, 
        string $class, 
        string $method
    ): void {
        $this->createRoute("POST", $route, $class, $method, $name = $route);
    }
}