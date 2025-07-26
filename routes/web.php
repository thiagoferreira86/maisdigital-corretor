<?php

use App\Controllers\LoginController;
use App\Controllers\DashboardController;
use App\Controllers\AgendaController;
use App\Controllers\RedesSociaisController;
use App\Controllers\PaginaDeVendasController;
use App\Controllers\EmailMarketingController;
use App\Controllers\ListaDeContatosController;
use App\Controllers\TutoriaisController;
use App\Controllers\UtilsController;
use App\Helpers\Session;

Session::start();

$url = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim($url, '/'));

$segmento       = $segments[0] ?? 'dashboard';
$controllerName = $segments[1] ?? 'dashboard';
$acao           = $segments[2] ?? 'index';
$params         = array_slice($segments, 3);

// Rotas protegidas
$rotasProtegidas = [
    'dashboard', 'agenda', 'redes-sociais', 'pagina-de-vendas',
    'cartoes-digitais', 'email-marketing', 'lista-de-contatos',
    'tutoriais'
];

// Se for rota protegida e não tiver login
if ($segmento === 'dashboard' && in_array($controllerName, $rotasProtegidas) && !Session::isLoggedIn()) {
    header("Location: /login");
    exit;
}

$controllerMap = [
    'dashboard' => DashboardController::class,
    'agenda' => AgendaController::class,
    'redes-sociais' => RedesSociaisController::class,
    'pagina-de-vendas' => PaginaDeVendasController::class,
    'cartoes-digitais' => PaginaDeVendasController::class,
    'email-marketing' => EmailMarketingController::class,
    'lista-de-contatos' => ListaDeContatosController::class,
    'tutoriais' => TutoriaisController::class,
    'login' => LoginController::class,
    'verificar-codigo' => LoginController::class,
    'validar-codigo' => LoginController::class
];

if (!array_key_exists($controllerName, $controllerMap)) {
    http_response_code(404);
    exit('Página não encontrada');
}

$controllerClass = $controllerMap[$controllerName];
$controller = new $controllerClass();

$acao_explode = explode('-', $acao);
if(count($acao_explode) >1){
    $acao = $acao_explode[0].strtoupper($acao_explode[1]);
}

if (method_exists($controller, $acao) && is_callable([$controller, $acao])) {
    call_user_func_array([$controller, $acao], $params);
} elseif (method_exists($controller, 'index')) {
    $controller->index();
} else {
    http_response_code(404);
    exit('Ação não encontrada');
}













// Verificação centralizada de sessão

    










/*
switch ($controllerName) {
    case 'dashboard':
        switch ($view) {
            case 'perfil':
                $controller = new DashboardController();
                switch ($acao) {
                    case 'atualiza-senha':
                        $controller = new DashboardController();
                        $controller->{$param1_function}();
                        break;
                    case 'atualiza-dados':
                        
                        $controller->{$param1_function}();
                        break;
                    default:
                        $controller->perfil();
                        break;
                }
                break;
            case 'aceite-termos':
                $controller = new DashboardController();
                $controller->aceiteTermos();
                break;
            case 'aceitar-termos':
                $controller = new DashboardController();
                $controller->aceitarTermos();
                break;
            case 'agenda':
                agendaExecute($acao);
                break;
            case 'redes-sociais':
                $controller = new RedesSociaisController();
                switch ($param1) {
                    case 'lista-artes':
                        $controller->{$param1_function}();
                        break;
                    default:
                        $controller->index();
                        break;
                }
                break;
            case 'pagina-de-vendas':
                $controller = new PaginadeVendasController();
                switch ($param1) {
                    case 'modelos-prontos':
                        $controller->{$param1_function}();
                        break;
                    case 'suas-paginas':
                        $controller->{$param1_function}();
                        break;
                    default:
                        $controller->index();
                        break;
                }
                break;
            case 'cartao-digital':
                $controller = new CartaoDigitalController();
                switch ($param1) {
                    case 'lista-artes':
                        $controller->{$param1_function}();
                        break;
                    default:
                        $controller->index();
                        break;
                }
                break;    
            case 'email-marketing':
                $controller = new EmailMarketingController();
                switch ($param1) {
                    case 'lista-artes':
                        $controller->{$param1_function}();
                        break;
                    default:
                        $controller->index();
                        break;
                }
                break;
            case 'lista-de-contatos':
                $controller = new ListaDeContatosController();
                switch ($param1) {
                    case 'lista-artes':
                        $controller->{$param1_function}();
                        break;
                    default:
                        $controller->index();
                        break;
                }
                break;
            case 'tutoriais':
                $controller = new TutoriaisController();
                switch ($param1) {
                    case 'lista-artes':
                        $controller->{$param1_function}();
                        break;
                    default:
                        $controller->index();
                        break;
                }
                break;
            case 'logout':
                $controller = new DashboardController();
                $controller->logout();
                break;
            default:
                $controller = new DashboardController();
                $controller->index();
                break;
        }
        break;
    case 'verificar-codigo':
        $controller = new LoginController();
        $controller->verificarCodigo();
        break;
    case 'validar-codigo':
        $controller = new LoginController();
        $controller->validarCodigo();
        break;   
    case 'pass':
        $controller = new UtilsController();
        $controller->pass();
        break;   
    case 'login':
        $controller = new LoginController();
        switch ($action) {
            case 'auth':
                $controller->{$action}();
                break;
            case 'logout':
                $controller->{$action}();
                break;
            default:
                $controller->index();
                break;
        }
        break;
    default:
        http_response_code(404);
        echo "Página não encontrada";
        break;
}


function agendaExecute($acao){
    $controller = new AgendaController();
    if(empty($acao) || $acao = ''){
        return $controller->index();
        exit;
    } else {
        return $controller->{$acao}();
        exit;
    }
}

*/