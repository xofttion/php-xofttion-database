<?php

namespace Xofttion\Database\Sql\Conditions;

final class EqualSmaller extends Condition
{
    // Constructor de la clase EqualSmaller

    private function __construct(string $column)
    {
        parent::__construct($column, '<=');
    }

    // Métodos estáticos de la clase EqualSmaller

    public static function create(string $column): self
    {
        return new static($column);
    }
}
