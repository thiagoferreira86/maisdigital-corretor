<?php
namespace App\Core;

class App {
    private Router $router;

    public function __construct(Router $router) {
        $this->router = $router;
    }

    public function run(): void {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = rtrim($uri, '/') ?: '/';
        $method = $_SERVER['REQUEST_METHOD'];

        $action = $this->router->resolve($method, $uri);

        if (!$action) {
            http_response_code(404);
            echo "Página não encontrada";
            return;
        }

        [$controller, $method] = explode('@', $action);
        $controller = "App\\Controllers\\$controller";

        if (!class_exists($controller) || !method_exists($controller, $method)) {
            http_response_code(500);
            echo "Erro no controller";
            return;
        }

        (new $controller)->$method();
    }
}
