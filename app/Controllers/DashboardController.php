<?php
namespace App\Controllers;

class DashboardController
{
    public function index()
    {
        require_once __DIR__ . '/../Views/dashboard.php';
    }
}
