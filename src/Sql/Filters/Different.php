<?php

namespace Xofttion\Database\Sql\Filters;

final class Different extends Filter
{
    // Constructor de la clase Different

    private function __construct(string $column)
    {
        parent::__construct($column, '!=');
    }

    // Métodos estáticos de la clase Different

    public static function create(string $column): self
    {
        return new static($column);
    }
}
