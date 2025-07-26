<?php
use App\Helpers\Session;
use App\Controllers\{
    LoginController, DashboardController, AgendaController,
    RedesSociaisController, PaginadeVendasController,
    EmailMarketingController, ListaDeContatosController,
    TutoriaisController, UtilsController
};

// Iniciar sessão
Session::start();

// Definir rotas protegidas
$rotasProtegidas = [
    'dashboard', 'agenda', 'redes-sociais', 'pagina-de-vendas', 'configuracoes', 'perfil', 'aceite-termos',
    'email-marketing', 'lista-de-contatos', 'cartoes-digitais', 'tutoriais'
];

// Analisar a URL
$url = $_SERVER['REQUEST_URI'];
$segments = explode('/', trim(parse_url($url, PHP_URL_PATH), '/'));

$controllerName = $segments[0] ?: 'dashboard';
$action = $segments[1] ?? 'index';
$params = array_slice($segments, 2);

// Proteger rotas
if (in_array($controllerName, $rotasProtegidas) && !Session::isLoggedIn()) {
    header("Location: /login");
    exit;
}

// Instanciar controlador
$controllerMap = [
    'dashboard' => DashboardController::class,
    'agenda' => AgendaController::class,
    'redes-sociais' => RedesSociaisController::class,
    'pagina-de-vendas' => PaginadeVendasController::class,
    'cartoes-digitais' => PaginadeVendasController::class,
    'email-marketing' => EmailMarketingController::class,
    'lista-de-contatos' => ListaDeContatosController::class,
    'tutoriais' => TutoriaisController::class,
    'login' => LoginController::class,
    'verificar-codigo' => LoginController::class,
    'validar-codigo' => LoginController::class,
    'pass' => UtilsController::class,
];

if (!array_key_exists($controllerName, $controllerMap)) {
    http_response_code(404);
    exit('Página não encontrada');
}

$controllerClass = $controllerMap[$controllerName];
$controller = new $controllerClass();

// Executar ação
if (method_exists($controller, $action)) {
    call_user_func_array([$controller, $action], $params);
} else {
    if (method_exists($controller, 'index')) {
        $controller->index();
    } else {
        http_response_code(404);
        exit('Ação não encontrada');
    }
}
