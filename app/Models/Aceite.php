<?php

namespace App\Models;

use \DateTime;

class CorretoraUsuarioAceite extends ActiveRecord {

    public ?int $id = null;
    public ?int $corretora_id = null;
    public ?int $usuario_id = null;
    public ?string $ip_address = null;
    public ?string $user_agent = null;
    public ?string $sistema = null;
    public ?string $navegador = null;
    public ?string $data_cadastro = null;

    public function getTable(): string {
        return 'MDM_corretoras_usuarios_aceites';
    }

    public function save(): bool {
        $now = (new DateTime())->format('Y-m-d H:i:s');
        if (empty($this->data_cadastro)) {
            $this->data_cadastro = $now;
        }
        return parent::save();
    }
    public static function find(int $id = 0, ?array $conditions = null, string $order = 'id DESC'): mixed {
        $conditions = self::treatConditions($id, $conditions);
        $result = self::load('MDM_corretoras_usuarios_aceites', static::class, $conditions, $order);

        if (!empty($id)) {
            $result = $result[0] ?? null;
        }
        return $result;
    }

    public static function paginate(int $page, int $quantity, string $conditions = "0=0", string $order = 'id DESC'): array {
        return self::find(0, [$conditions], $order . " LIMIT " . ($page * $quantity) . ",$quantity");
    }
}