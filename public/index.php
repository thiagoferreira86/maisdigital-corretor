<?php
// Força redirecionamento para HTTPS
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    $httpsURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: ' . $httpsURL, true, 301);
    exit;
}

// Cabeçalhos de segurança
header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

// Segurança dos cookies de sessão
ini_set('session.cookie_secure', '1');
ini_set('session.cookie_httponly', '1');
ini_set('session.cookie_samesite', 'Strict');

session_start();

// Autoload e configurações
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Models/Config.php';
require_once __DIR__ . '/../routes/web.php';

?>