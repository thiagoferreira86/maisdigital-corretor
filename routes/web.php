<?php

use App\Controllers\LoginController;
use App\Controllers\HomeController;
use App\Controllers\AgendaController;
use App\Controllers\RedesSociaisController;
use App\Controllers\PaginadeVendasController;
use App\Controllers\EmailMarketingController;
use App\Controllers\ListaDeContatosController;
use App\Helpers\Session;

Session::start();

$url = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim($url, '/'));

//print_r($segments);

if($segments[0] == ''){
    $controllerName = 'home';
} else {
    $controllerName = $segments[0];
}
$action = $segments[1] ?? 'index';
$params = array_slice($segments, 2);

// Rotas que exigem login
$rotasProtegidas = [
    'home',
    'agenda',
    'redes-sociais',
    'pagina-de-vendas',
    'email-marketing',
    'lista-de-contatos',
    'tutoriais'
];

//print $controllerName;
// Verificação centralizada de sessão
if (in_array($controllerName, $rotasProtegidas) && !Session::isLoggedIn()) {
    header("Location: /login");
    exit;
}

switch ($controllerName) {
    case 'login':
        $controller = new LoginController();
        switch ($action) {
            case 'auth':
                $controller->auth();
                break;
            case 'logout':
                $controller->logout();
                break;
            default:
                $controller->index();
                break;
        }
        break;

    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;

    case 'agenda':
        $controller = new AgendaController();
        $controller->index();
        break;

    case 'redes-sociais':
        $controller = new RedesSociaisController();
        switch ($action) {
            case 'lista-artes':
                $controller->listaArtes();
                break;
            default:
                $controller->index();
                break;
        }
        break;

    case 'pagina-de-vendas':
        $controller = new PaginaDeVendasController();
        switch ($action) {
            case 'lista-artes':
                $controller->listaArtes;
                break;
            default:
                $controller->index();
                break;
        }
        break;
        

    case 'email-marketing':
        $controller = new EmailMarketingController();
        $controller->index();
        break;

    case 'lista-de-contatos':
        $controller = new ListaDeContatosController();
        $controller->index();
        break;

    case 'tutoriais':
        $controller = new ListaDeContatosController();
        $controller->index();
        break;

    default:
        http_response_code(404);
        echo "Página não encontrada";
        break;
}
