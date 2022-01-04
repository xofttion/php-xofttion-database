<?php

namespace Xofttion\Database\Sql\Conditions;

final class EqualGreater extends Condition
{
    // Constructor de la clase EqualGreater

    private function __construct(string $column)
    {
        parent::__construct($column, '>=');
    }

    // Métodos estáticos de la clase EqualGreater

    public static function create(string $column): self
    {
        return new static($column);
    }
}
