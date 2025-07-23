<?php

use App\Controllers\LoginController;
use App\Controllers\DashboardController;

session_start();

if (!isset($_SESSION['corretora_id'])) {
    $controller = new LoginController();
    $controller->index();
} else {
    $route = $_GET['url'] ?? 'home';
    if ($route === '') {
        $controller = new LoginController();
        $controller->index();
    } elseif ($route === 'auth') {
        $controller = new LoginController();
        $controller->auth();
    } elseif ($route === 'logout') {
        $controller = new LoginController();
        $controller->logout();
    } elseif ($route === 'home') {
        if (!isset($_SESSION['corretor_id'])) {
            header("Location: /login");
            exit;
        }
        $controller = new DashboardController();
        $controller->index();
    } else {
        echo "Página não encontrada";
    }
}

