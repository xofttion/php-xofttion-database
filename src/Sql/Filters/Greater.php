<?php

namespace Xofttion\Database\Sql\Filters;

final class Greater extends Filter
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
