<?php

namespace Xofttion\Database\Sql\Clauses\Filters;

use Xofttion\Database\Sql\Filters\IsNotNull as IsNotNullFilter;

final class IsNotNull extends Filter
{
    // Constructor de la clase IsNotNull

    private function __construct(string $column, ?string $union = null)
    {
        $this->filter = IsNotNullFilter::create($column);

        parent::__construct([], $union);
    }

    // Métodos estáticos de la clase IsNotNull

    public static function create(string $column, ?string $union = null): self
    {
        return new static($column, $union);
    }
}
