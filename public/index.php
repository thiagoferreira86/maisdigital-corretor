<?php
require_once __DIR__ . '/../config.php';

use App\Core\App;
use App\Core\Router;

$router = new Router();
$router->get('/', 'HomeController@index');

$app = new App($router);
$app->run();
