<?php

namespace Xofttion\Database\Sql\Conditions;

final class Like extends Condition
{
    // Constructor de la clase Like

    private function __construct(string $column, bool $not = false)
    {
        parent::__construct($column, 'LIKE', $not);
    }

    // Métodos estáticos de la clase Like

    public static function create(string $column, bool $not = false): self
    {
        return new static($column, $not);
    }
}
