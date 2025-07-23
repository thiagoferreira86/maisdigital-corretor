<?php
namespace App\Core;

class Router {
    private array $routes = [];

    public function get(string $uri, string $action): void {
        $this->routes['GET'][$uri] = $action;
    }

    public function resolve(string $method, string $uri): ?array {
        return $this->routes[$method][$uri] ?? null;
    }
}
