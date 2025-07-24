<?php
declare(strict_types=1);

namespace App\Models;

class ArteTema extends ActiveRecord
{
    public ?int $id = null;
    public string $nome = '';

    public function getTable(): string
    {
        return 'MDM_artes_temas';
    }

    public static function campo(int $id, string $campo): mixed
    {
        $result = self::find($id);
        return $result->{$campo} ?? null;
    }

    public static function find(int $id = 0, ?array $conditions = null, string $order = 'nome ASC'): mixed
    {
        $conditions = self::treatConditions($id, $conditions);
        $result = self::load('MDM_artes_temas', 'ArteTema', $conditions, $order);

        return $id !== 0 ? ($result[0] ?? null) : $result;
    }

    public static function paginate(int $page, int $quantity, string $conditions = "1=1", string $order = 'nome ASC'): array
    {
        $offset = $page * $quantity;
        return self::find(0, [$conditions], "$order LIMIT $offset, $quantity");
    }
}
