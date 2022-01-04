<?php

namespace Xofttion\Database\Sql\Filters;

final class EqualGreater extends Filter
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
