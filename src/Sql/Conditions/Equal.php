<?php

namespace Xofttion\Database\Sql\Conditions;

final class Equal extends Condition
{
    // Constructor de la clase Equal

    private function __construct(string $column)
    {
        parent::__construct($column, '=');
    }

    // Métodos estáticos de la clase Equal

    public static function create(string $column): self
    {
        return new static($column);
    }
}
