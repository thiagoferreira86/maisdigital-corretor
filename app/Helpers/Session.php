<?php
namespace App\Helpers;

class Session
{
    private const TIMEOUT = TEMPO_DE_SESSION; // 1 hora (em segundos)

    public static function start(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica expiração
        if (isset($_SESSION['LAST_ACTIVITY']) && time() - $_SESSION['LAST_ACTIVITY'] > self::TIMEOUT) {
            session_unset();
            session_destroy();
            session_start(); // reinicia limpa para evitar erro
        }

        // Renova tempo de sessão
        $_SESSION['LAST_ACTIVITY'] = time();
    }

    public static function get(string $key): mixed
    {
        self::start();
        return $_SESSION[$key] ?? null;
    }

    public static function set(string $key, mixed $value): void
    {
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function remove(string $key): void
    {
        self::start();
        unset($_SESSION[$key]);
    }

    public static function destroy(): void
    {
        if (session_status() !== PHP_SESSION_NONE) {
            session_unset();
            session_destroy();
        }
    }

    public static function isLoggedIn(): bool
    {
        self::start();
        return isset($_SESSION['corretora_id'], $_SESSION['corretora_usuario_id']);
    }
}
