<?php

namespace Xofttion\Database\Sql\Utils;

class ResultSet
{
    // Atributos de la clase ResultSet

    private array $rows;

    private int $affected;

    // Constructor de la clase ResultSet

    private function __construct(int $affected)
    {
        $this->affected = $affected;
        $this->rows = [];
    }

    // Métodos estáticos de la clase ResultSet

    public static function create(int $affected): self
    {
        return new static($affected);
    }

    // Métodos de la clase ResultSet

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
