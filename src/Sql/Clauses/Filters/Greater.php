<?php

namespace Xofttion\Database\Sql\Clauses\Filters;

use Xofttion\Database\Sql\Filters\Greater as GreaterFilter;

final class Greater extends Filter
{
    // Constructor de la clase Greater

    private function __construct(
        string $column,
        string $value,
        ?string $union = null
    ) {
        $this->filter = GreaterFilter::create($column);

        parent::__construct([$value], $union);
    }

    // Métodos estáticos de la clase Greater

    public static function create(
        string $column,
        string $value,
        ?string $union = null
    ): self {
        return new static($column, $value, $union);
    }
}
