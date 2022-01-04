<?php

namespace Xofttion\Database\Sql\Conditions;

final class Greater extends Condition
{
    // Constructor de la clase Greater

    private function __construct(string $column)
    {
        parent::__construct($column, '>');
    }

    // Métodos estáticos de la clase Greater

    public static function create(string $column): self
    {
        return new static($column);
    }
}
