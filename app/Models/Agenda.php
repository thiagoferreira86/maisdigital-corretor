<?php
declare(strict_types=1);

declare(strict_types=1);

namespace App\Models;

class Agenda extends ActiveRecord
{
    public ?int $id = null;
    public int $corretora = 0;
    public string $end = '';
    public string $start = '';
    public string $title = '';
    public string $color = '';
    public string $detalhes = '';

    public function getTable(): string: string
    {
        return 'MDM_agenda';
    }

    public static function last(): ?self
    {
        $last = self::find(0, null, 'id DESC LIMIT 1');
        return $last[0] ?? null;
    }

    public static function find(int $id = 0, ?array $conditions = null, string $order = 'id ASC'): mixed
    {
        $conditions = self::treatConditions($id, $conditions);
        $result = self::load('MDM_agenda', self::class, $conditions, $order);

        return $id > 0 ? ($result[0] ?? null) : $result;
    }

    public static function paginate(int $page, int $quantity, string $conditions = "0=0", string $order = 'id ASC'): array
    {
        $limit = sprintf('%d,%d', $page * $quantity, $quantity);
        return self::find(0, [$conditions], "$order LIMIT $limit");
    }
}
