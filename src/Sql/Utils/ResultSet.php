<?php

namespace Xofttion\Database\Sql\Utils;

class ResultSet
{
    private array $rows;

    private int $affected;

    private function __construct(int $affected, array $rows = [])
    {
        $this->affected = $affected;
        $this->rows = $rows;
    }

    public static function create(int $affected, array $rows = []): self
    {
        return new static($affected, $rows);
    }

    public function affected(): int
    {
        return $this->affected;
    }

    public function rows(): array
    {
        return $this->rows;
    }
}
