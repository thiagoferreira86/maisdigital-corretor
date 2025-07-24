<?php

declare(strict_types=1);

namespace App\Models;

class Arte extends ActiveRecord
{
    public ?int $id = null;
    public string $nome = '';
    public string $formato = '';
    public string $tipo = '';
    public string $imagem = '';
    public string $tema = '';
    public string $status = '';
    public ?string $logox = null;
    public ?string $logoy = null;
    public ?string $whatsappx = null;
    public ?string $whatsappy = null;
    public ?string $data_cadastro = null;
    public int $downloads = 0;
    public ?string $disclamimer_x = null;
    public ?string $disclamimer_y = null;

    public function getTable(): string
    {
        return 'MDM_artes';
    }

    public static function campo(int $id, string $campo): mixed
    {
        $result = self::find($id);
        return $result->{$campo} ?? null;
    }

    public static function download(int $id): bool
    {
        self::add((new static())->getTable(), $id, 'downloads');
        return true;
    }

    public function save(): bool
    {
        if (empty($this->data_cadastro)) {
            $this->data_cadastro = date("Y-m-d H:i:s");
        }
        return parent::save();
    }

    public static function last(): ?self
    {
        $last = self::find(0, null, 'id DESC LIMIT 1');
        return $last[0] ?? null;
    }

    public static function find(int $id = 0, ?array $conditions = null, string $order = 'id DESC'): mixed
    {
        $conditions = self::treatConditions($id, $conditions);
        $result = self::load('MDM_artes', self::class, $conditions, $order);

        return $id > 0 ? ($result[0] ?? null) : $result;
    }

    public static function paginate(int $page, int $quantity, string $conditions = "0=0", string $order = 'id DESC'): array
    {
        $limit = sprintf('%d,%d', $page * $quantity, $quantity);
        return self::find(0, [$conditions], "$order LIMIT $limit");
    }
}
