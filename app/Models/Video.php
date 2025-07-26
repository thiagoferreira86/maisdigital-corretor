<?php

declare(strict_types=1);

namespace App\Models;

class Video extends ActiveRecord
{
    public ?int $id = null;
    public string $titulo = '';
    public string $subtitulo = '';
    public string $iframe = '';
    public string $imagem = '';
    public string $texto = '';
    public string $status = '';
    public string $url = '';
    public ?string $data_cadastro = null;
    public int $views = 0;

    public function getTable(): string
    {
        return 'MDM_videos';
    }

    public static function campo(int $id, string $campo): mixed
    {
        $result = self::find($id);
        return $result->{$campo} ?? null;
    }

    public function save(): bool
    {
        $this->texto = addslashes($this->texto);
        $this->iframe = addslashes($this->iframe);

        if (empty($this->url)) {
            $this->url = CleanString::clean($this->titulo);
        }

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
        $result = self::load('MDM_videos', self::class, $conditions, $order);

        return $id > 0 ? ($result[0] ?? null) : $result;
    }

    public static function paginate(int $page, int $quantity, string $conditions = "0=0", string $order = 'id DESC'): array
    {
        $limit = sprintf('%d,%d', $page * $quantity, $quantity);
        return self::find(0, [$conditions], "$order LIMIT $limit");
    }
}
