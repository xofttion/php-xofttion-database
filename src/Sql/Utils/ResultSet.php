<?php

namespace Xofttion\Database\Sql\Utils;

class ResultSet
{
    private array $rows;

    private int $affected;

    private function __construct(int $affected)
    {
        $this->affected = $affected;
        $this->rows = [];
    }

    public static function create(int $affected): self
    {
        return new static($affected);
    }

    public function affected(): int
    {
        return $this->affected;
    }

    public function rows(): array
    {
        return $this->rows;
    }

    public function add(Row $row): void
    {
        $this->rows[] = $row;
    }
}
