<?php

namespace Xofttion\Database\Sql\Conditions;

final class Smaller extends Condition
{
    // Constructor de la clase Smaller

    private function __construct(string $column)
    {
        parent::__construct($column, '<');
    }

    // Métodos estáticos de la clase Smaller

    public static function create(string $column): self
    {
        return new static($column);
    }
}
