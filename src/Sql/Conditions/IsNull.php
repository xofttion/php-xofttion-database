<?php

namespace Xofttion\Database\Sql\Conditions;

final class IsNull extends Condition
{
    // Constructor de la clase IsNull

    private function __construct(string $column)
    {
        parent::__construct($column, 'IS');
    }

    // Métodos estáticos de la clase IsNull

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
