<?php

namespace Xofttion\Database\Sql\Filters;

final class IsNotNull extends Filter
{
    // Constructor de la clase IsNotNull

    private function __construct(string $column)
    {
        parent::__construct($column, 'IS NOT');
    }

    // Métodos estáticos de la clase IsNotNull

    public static function create(string $column): self
    {
        return new static($column);
    }

    // Métodos sobrescritos de la clase Filter

    public function getValue(): string
    {
        return 'NULL';
    }
}
