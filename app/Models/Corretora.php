<?php

namespace App\Models;

class Corretora extends ActiveRecord
{
    public int $id;
    public string $nome;
    public string $razao;
    public string $email;
    public string $cpf_cnpj;
    public ?string $telefone = null;
    public ?string $whatsapp = null;
    public ?string $categoria_id = null;
    public ?string $cep = null;
    public ?string $endereco = null;
    public ?string $numero = null;
    public ?string $complemento = null;
    public ?string $bairro = null;
    public ?string $cidade = null;
    public ?string $estado = null;
    public ?string $codigo = null;
    public ?string $pasta = null;
    public ?string $token = null;
    public ?string $status = null;
    public ?string $logotipo = null;
    public ?string $data_atualizacao = null;
    public ?string $data_cadastro = null;
    public ?string $data_ultimo_acesso = null;
    public ?string $excluido = null;

    public function getTable(): string
    {
        return 'MDM_corretoras';
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

    public function save(): bool
    {
        $this->data_atualizacao = date('Y-m-d H:i:s');

        if (empty($this->data_cadastro)) {
            $this->data_cadastro = date('Y-m-d H:i:s');
        }

        if (empty($this->status)) {
            $this->status = 'Ativo';
        }
        
        if (empty($this->excluido)) {
            $this->excluido = 'n';
        }

        if (empty($this->token)) {
           $this->token = self::gerarToken(64);
        }

        return parent::save();
    }

    public static function find(int|string $id = 0, ?array $conditions = null, string $order = 'nome ASC'): mixed
    {
        $conditions = self::treatConditions($id, $conditions);
        $result = self::load('MDM_corretoras', static::class, $conditions, $order);

        if (!empty($id)) {
            return $result[0] ?? null;
        }

        return $result;
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