<?php
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

define('VERSION', $_ENV['VERSION'] ?? '');
// Configurações base via .env
define('HOSTNAME', $_ENV['DB_HOST'] ?? 'localhost');
define('DATABASE', $_ENV['DB_NAME'] ?? 'mapfre_banco');
define('USERNAME', $_ENV['DB_USER'] ?? 'mapfre_usuario');
define('PASSWORD', $_ENV['DB_PASS'] ?? 'Baeta2025@');

define('SERVER', $_ENV['EMAIL_SERVER'] ?? 'cpanel.app.otimize.online');
define('USER', $_ENV['EMAIL_USER'] ?? 'otimize');
define('PASS', $_ENV['EMAIL_PASS'] ?? 'Baeta2021@');
define('SECRET', $_ENV['APP_SECRET'] ?? '');

define('EMAIL_HOST', $_ENV['EMAIL_HOST'] ?? '');
define('EMAIL_PORT', $_ENV['EMAIL_PORT'] ?? '465');
define('EMAIL_USERNAME', $_ENV['EMAIL_USERNAME'] ?? '');
define('EMAIL_PASSWORD', $_ENV['EMAIL_PASSWORD'] ?? '');
define('EMAIL_FROM', $_ENV['EMAIL_FROM'] ?? '');
define('EMAIL_FROM_NAME', $_ENV['EMAIL_FROM_NAME'] ?? '');

define('EMAIL_HOST_CAMPAIGN', $_ENV['EMAIL_HOST_CAMPAIGN'] ?? '');
define('EMAIL_PORT_CAMPAIGN', $_ENV['EMAIL_PORT_CAMPAIGN'] ?? '465');
define('EMAIL_USERNAME_CAMPAIGN', $_ENV['EMAIL_USERNAME_CAMPAIGN'] ?? '');
define('EMAIL_PASSWORD_CAMPAIGN', $_ENV['EMAIL_PASSWORD_CAMPAIGN'] ?? '');
define('EMAIL_FROM_CAMPAIGN', $_ENV['EMAIL_FROM_CAMPAIGN'] ?? '');
define('EMAIL_FROM_NAME_CAMPAIGN', $_ENV['EMAIL_FROM_NAME_CAMPAIGN'] ?? '');

define('TITULO', str_replace("-", " ", $_ENV['APP_NAME']) ?? '+Digital MAPFRE');
define('EMAIL', $_ENV['APP_EMAIL'] ?? 'contato@segbox.com');
define('EMAIL_NOME', $_ENV['APP_EMAIL_NOME'] ?? '[ Parceiro MAPFRE ]');

define('RECAPTCHA_SITEKEY', $_ENV['RECAPTCHA_SITEKEY'] ?? '');
define('RECAPTCHA_SECRET', $_ENV['RECAPTCHA_SECRET'] ?? '');

define('TERMOS_E_CONDICOES', $_ENV['TERMOS_E_CONDICOES'] ?? '');
define('CSS_VERSION', $_ENV['CSS_VERSION'] ?? '');
define('JS_VERSION', $_ENV['JS_VERSION'] ?? '');

define('BASE', $_ENV['URL_DASHBOARD'] ?? 'https://dev.mapfrecorretor.com.br/');

define('TEMPLATES', BASE . 'templates/');
define('TEMPLATES_SITES', BASE . 'templates/sites/');
define('TEMPLATES_EMAILS', BASE . 'templates/emails/');
define('TEMPLATES_LANDINGPAGES', BASE . 'templates/landingpages/');

define('LOGOTIPO', BASE . 'imagens/mapfre-white.png');
define('LOGOTIPO_VERMELHO', BASE . 'imagens/mapfre-v.png');
define('LOGOTIPO_BRANCO', BASE . 'imagens/mapfre-white.png');
define('FAVICON', BASE . 'imagens/favicon.png');

define('SENHA_PADRAO', $_ENV['SENHA_PADRAO']);

define('TEMPO_DE_SESSION', $_ENV['TEMPO_DE_SESSION'] ?? 3600);
define('TEMPO_DE_VERIFICACAO', $_ENV['TEMPO_DE_VERIFICACAO'] ?? 5);

date_default_timezone_set('America/Sao_Paulo');

$root = dirname($_SERVER["PHP_SELF"]) == DIRECTORY_SEPARATOR ? "" : dirname($_SERVER["PHP_SELF"]);
define("ROOT", $root);

function clearUpload($id){
    $LetraProibi = Array(" ",",","'","\"","&","|","!","#","$","¨","*","(",")","`","´","<",">",";","=","+","§","{","}","[","]","^","~","?","%");
    $special = Array('Á','È','ô','Ç','á','è','Ò','ç','Â','Ë','ò','â','ë','Ø','Ñ','À','Ð','ø','ñ','à','ð','Õ','Å','õ','Ý','å','Í','Ö','ý','Ã','í','ö','ã',
        'Î','Ä','î','Ú','ä','Ì','ú','Æ','ì','Û','æ','Ï','û','ï','Ù','®','É','ù','©','é','Ó','Ü','Þ','Ê','ó','ü','þ','ê','Ô','ß','‘','’','‚','“','”','„');
    $clearspc = Array('a','e','o','c','a','e','o','c','a','e','o','a','e','o','n','a','d','o','n','a','o','o','a','o','y','a','i','o','y','a','i','o','a',
        'i','a','i','u','a','i','u','a','i','u','a','i','u','i','u','','e','u','c','e','o','u','p','e','o','u','b','e','o','b','','','','','','');
    $newId = str_replace($special, $clearspc, $id);
    $newId = str_replace($LetraProibi, "", trim($newId));
    return strtolower($newId);
}

function str2Upper($value) {
	$original = "àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ";
    $replacer = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß";
    $value = strtr( strtoupper($value), $original, $replacer );
    return $value;
}

function str2Lower($value) {
    $original = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß";
	$replacer = "àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ";
    $value = strtr( strtolower($value), $original, $replacer );
    return $value;
}

function stripSpecial($value) {
    $original = "àáâãäçèéêëìíîïñòóôõö÷øùüúþÿ";
	$replacer = "aaaaaceeeeiiiinooooo-ouuuby";
    $value = strtr( strtolower($value), $original, $replacer );
    return $value;
}

function removerAcento($str){
    $from = 'ÀÁÃÂÉÊÍÓÕÔÚÜÇàáãâéêíóõôúüç';
    $to   = 'AAAAEEIOOOUUCaaaaeeiooouuc';
    return strtr($str, $from, $to);
}
function mascararEmail(string $email): string {
    [$usuario, $dominio] = explode('@', $email);

    // Parte do nome
    $primeiraLetra = substr($usuario, 0, 1);
    $ultimaLetra = substr($usuario, -1);
    $mascaraUsuario = $primeiraLetra . str_repeat('*', max(strlen($usuario) - 2, 1)) . $ultimaLetra;

    // Parte do domínio
    $dominioParts = explode('.', $dominio);
    $dominioNome = $dominioParts[0];
    $dominioOculto = substr($dominioNome, 0, 1) . str_repeat('*', max(strlen($dominioNome) - 1, 1));
    $extensao = isset($dominioParts[1]) ? '.' . $dominioParts[1] : '';

    return $mascaraUsuario . '@' . $dominioOculto . $extensao;
}

function listaimagemRemoveAcentos($str, $enc = "UTF-8"){

	$acentos = array(
	'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
	'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
	'C' => '/&Ccedil;/',
	'c' => '/&ccedil;/',
	'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
	'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
	'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
	'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
	'N' => '/&Ntilde;/',
	'n' => '/&ntilde;/',
	'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
	'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
	'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
	'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
	'Y' => '/&Yacute;/',
	'y' => '/&yacute;|&yuml;/',
	'a.' => '/&ordf;/',
	'o.' => '/&ordm;/');

   	return preg_replace($acentos, array_keys($acentos), htmlentities($str,ENT_NOQUOTES, $enc));
}

function toURL($value) {
	$value = listaimagemRemoveAcentos($value, "UTF-8");
	$value = urlencode($value);
	$value = str_replace("+", "-", $value);
    return str2Lower($value);
}

function truncate($string, $qtd) {
	return substr($string, 0, $qtd);
}

function mes($digito=0) {

	$digito = $digito==0?date('n'):(int)$digito;
	
	$meses = array('',
	'Janeiro',
	'Fevereiro',
	'Março',
	'Abril',
	'Maio',
	'Junho',
	'Julho',
	'Agosto',
	'Setembro',
	'Outubro',
	'Novembro',
	'Dezembro'
	);
	return $meses[$digito];
}

function mesAbrv($data) {
    $data = explode("/", $data);
    $digito = $data[0];
	$digito = $digito==0?date('n'):(int)$digito;
	$meses = array('',
    	'Jan',
    	'Fev',
    	'Mar',
    	'Abr',
    	'Mai',
    	'Jun',
    	'Jul',
    	'Ago',
    	'Set',
    	'Out',
    	'Nov',
    	'Dez'
	);
	return $meses[$digito].'/'.$data[1];
}

function dia($digito=0) {
	$digito = $digito==0?date('N'):(int)$digito;
	$dias = array('',
	'Segunda-Feira',
	'Terça-Feira',
	'Quarta-Feira',
	'Quinta-Feira',
	'Sexta-Feira',
	'Sábado',
	'Domingo'
	);
	return $dias[$digito];
}
function formataMoneyMundo($valor){
    $total = str_replace(".", "", $valor);
    $total = str_replace(",", ".", $total);
    return $total;
}
function formataMoneyBrasil($valor){
    $total = number_format($valor, 2, ",", ".");
    return $total;
}
function limpaUrl($str){

	$str = strtolower(utf8_decode($str)); $i=1;
	$str = strtr($str, utf8_decode('àáâãäåæçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaaaceeeeiiiinoooooouuuyyy');
	$str = preg_replace("/([^a-z0-9])/",'-',utf8_encode($str));
	while($i>0) $str = str_replace('--','-',$str,$i);
	if (substr($str, -1) == '-') $str = substr($str, 0, -1);
	return $str;
}
function notificaAdmin($tipo){
 if($tipo == 'Corretor'){
     $mensagem = 'Novo Corretor cadastrado';
 }
 if($tipo == 'Pedido'){
     $mensagem = 'Novo Pedido cadastrado';
 }
 if($tipo == 'Aprovado'){
     $mensagem = 'Novo Pagamento Aprovado';
 }
 $admins = Admin::find(0);
 foreach($admins as $admin){
     $n = new Notificacao();
     $n->admin = $admin->id;
     $n->corretor = 0;
     $n->tipo = $tipo;
     $n->mensagem = $mensagem;
     $n->data_cadastro = date("Y-m-d H:i:s");
     $n->lida = 'Não';
     $n->save();
 }
}
function notificaCorretor($tipo, $user){
     $n = new Notificacao();
     $n->admin = 0;
     $n->corretor = $user;
     $n->tipo = $tipo;
     $n->mensagem = $mensagem;
     $n->data_cadastro = date("Y-m-d H:i:s");
     $n->lida = 'Não';
     $n->save();
 
}
function ultima_atualizacao() {
	$ultima = Noticia::last();
	return strtotime($ultima->data());
}
function pegaUsuario($id) {
	$usuario = Usuario::find($id);
	return $usuario->nome;
}
function pegaCategoria($id){
    $categoria = Categoria::find($id);
    return $categoria->nome;
}
function formataDataHora($data){
    $d = date_create($data);
    $d = date_format($d, "d/m/Y H:i:s");
    return $d;
}
function formataData($data){
    $d = date_create($data);
    $d = date_format($d, "d/m/Y");
    return $d;
}
function formataDataAll($obj){
    $date = date_create($obj);
    return date_format($date, 'd/m/Y H:i:s');
}
function formataDate($obj){
    $date = date_create($obj);
    return date_format($date, 'Y-m-d H:i:s');
}
function getUserIP(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    } elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    } else {
        $ip = $remote;
    }
    return $ip;
}
function safe($var, $default = '') {
    return isset($var) ? $var : $default;
}
function getBrowserName($user_agent) {
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    if (strpos($user_agent, 'Edg')) return 'Edge';
    if (strpos($user_agent, 'Chrome')) return 'Chrome';
    if (strpos($user_agent, 'Safari')) return 'Safari';
    if (strpos($user_agent, 'Firefox')) return 'Firefox';
    if (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
    return 'Desconhecido';
}
?>