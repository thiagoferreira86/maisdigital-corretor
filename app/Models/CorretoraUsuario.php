<?php

namespace App\Models;

class CorretoraUsuario extends ActiveRecord
{
    public int $id;
    public int $corretora_id;
    public string $nome;
    public string $email;
    public string $cpf;
    public ?string $telefone = null;
    public ?string $token = null;
    public ?string $status = null;
    public ?string $recovery = null;
    public ?string $data_atualizacao = null;
    public ?string $data_cadastro = null;
    public ?string $data_ultimo_acesso = null;
    public ?string $excluido = null;
    public ?string $senha = null; // adicionada para uso no save()
    public ?string $primeiro_acesso = null;
    public ?string $validado = null;
    
    public function getTable(): string
    {
        return 'MDM_corretoras_usuarios';
    }

    public static function atualiza(int|string $id, string $campo, mixed $valor): bool
    {
        $result = self::find($id);
        if ($result) {
            $result->{$campo} = $valor;
            return $result->save();
        }
        return false;
    }

    public static function campo(int|string $id, string $campo): mixed
    {
        $result = self::find($id);
        return $result->{$campo} ?? null;
    }

    public function save(): bool{
        $this->data_atualizacao = date('Y-m-d H:i:s');

        if (empty($this->data_cadastro)) {
            $this->data_cadastro = date('Y-m-d H:i:s');
        }

        if (empty($this->status)) {
            $this->status = 'Ativo';
        }
        
        if (empty($this->primeiro_acesso)) {
            $this->primeiro_acesso = 's';
        }

        if (empty($this->validado)) {
            $this->validado = 'n';
        }

        if (!empty($this->senha) && !preg_match('/^\\$2y\\$/', $this->senha)) {
            $this->senha = password_hash($this->senha, PASSWORD_DEFAULT);
        }
        if (empty($this->token)) {
           $this->token = self::gerarToken(64);
        }
        return parent::save();
    }
    
    public static function autenticar($cpf, $senha_digitada) {
        $usuarios = self::find(0, ["cpf = '".addslashes($cpf)."' AND excluido != 's' AND status = 'Ativo'"], 'nome ASC');
        if (count($usuarios) == 0) return null;
    
        $usuario = $usuarios[0];
        
        if (password_verify($senha_digitada, $usuario->senha)) {
            return $usuario; // login bem-sucedido
        }
    
        return null; // senha incorreta
    }

    public static function find(int|string $id = 0, ?array $conditions = null, string $order = 'nome ASC'): mixed
    {
        $conditions = self::treatConditions($id, $conditions);
        $result = self::load('MDM_corretoras_usuarios', static::class, $conditions, $order);

        if (!empty($id)) {
            return $result[0] ?? null;
        }

        return $result;
    }
    
    public static function senhaValida(string $senha): bool {
        return preg_match('/^(?=.*[\W])(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,50}$/', $senha) === 1;
    }


    public static function paginate(int $page, int $quantity, string $conditions = "0=0", string $order = 'nome ASC'): array
    {
        return self::find(0, [$conditions], $order . " LIMIT " . ($page * $quantity) . ",$quantity");
    }

    public static function gerarToken(int $tamanho = 64): string
    {
        return bin2hex(random_bytes($tamanho));
    }
}