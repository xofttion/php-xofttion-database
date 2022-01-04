<?php

namespace Xofttion\Database\Sql\Clauses\Filters;

use Xofttion\Database\Sql\Filters\IsNull as IsNullFilter;

final class IsNull extends Filter
{
    // Constructor de la clase IsNull

    private function __construct(string $column, ?string $union = null)
    {
        $this->filter = IsNullFilter::create($column);

        parent::__construct([], $union);
    }

    // Métodos estáticos de la clase IsNull

    public static function create(string $column, ?string $union = null): self
    {
        return new static($column, $union);
    }
}
