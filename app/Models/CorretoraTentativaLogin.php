<?php

namespace App\Models;

class CorretoraTentativaLogin extends ActiveRecord {
    
    public ?int $id = null;
    public string $cpf = '';
    public string $ip = '';
    public int $tentativas = 0;
    public ?string $data_cadastro = null;
    public ?string $bloqueado_ate = null;    
    public string $excluido = 'n'; // 's' ou 'n'

    public function getTable(): string {
        return 'MDM_corretoras_tentativas_login';
    }

    public function save(): bool {
        $this->data_cadastro = date("Y-m-d H:i:s");
        return parent::save();
    }

    public static function registrarTentativa(string $cpf): void {
        $ip = getUserIP();
        $safeCPF = addslashes($cpf);
        $safeIp = addslashes($ip);
        $registro = self::find(0, ["$cpf = '{$safeCPF}' AND ip = '{$safeIp}'"]);

        $bloqueioMinutos = 15;
        $limiteTentativas = 5;

        if ($registro) {
            $reg = $registro[0];
            $reg->tentativas++;
            if ($reg->tentativas >= $limiteTentativas) {
                $reg->bloqueado_ate = date("Y-m-d H:i:s", strtotime("+{$bloqueioMinutos} minutes"));
            }
            $reg->save();
        } else {
            $novo = new CorretoraTentativaLogin();
            $novo->cpf = $cpf;
            $novo->ip = $ip;
            $novo->tentativas = 1;
            $novo->data_cadastro = date("Y-m-d H:i:s");
            $novo->save();
        }
    }
    
    public static function find(int $id = 0, ?array $conditions = null, string $order = 'id DESC'): array|static|null {
        $conditions = self::treatConditions($id, $conditions);
        $result = self::load('MDM_corretoras_tentativas_login', static::class, $conditions, $order);

        if ($id !== 0) {
            return $result[0] ?? null;
        }
        return $result;
    }
    
    public static function tempoRestante(string $cpf): ?int {
        $ip = getUserIP();
        $registro = self::find(0, ["cpf = '$cpf' AND ip = '$ip'"]);
    
        if ($registro) {
            $reg = $registro[0];
            if (!empty($reg->bloqueado_ate)) {
                $agora = time();
                $bloqueadoAte = strtotime($reg->bloqueado_ate);
                $restante = $bloqueadoAte - $agora;
                return $restante > 0 ? $restante : null;
            }
        }
    
        return null;
    }

    public static function estaBloqueado(string $cpf): bool {
        $ip = getUserIP();
        $registro = self::find(0, ["cpf = '$cpf' AND ip = '$ip'"]);

        if ($registro) {
            $reg = $registro[0];
            if (!empty($reg->bloqueado_ate) && strtotime($reg->bloqueado_ate) > time()) {
                return true;
            }
        }
        return false;
    }

    public static function limparTentativas(string $cpf): void {
        $ip = getUserIP();
        $registros = self::find(0, ["cpf = '$cpf' AND ip = '$ip'"]);
        foreach ($registros as $r) {
            $r->excluido = 's'; // Marca como excluído
            $r->save();
        }
    }
}
