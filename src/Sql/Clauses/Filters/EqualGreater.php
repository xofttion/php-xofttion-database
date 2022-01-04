<?php

namespace Xofttion\Database\Sql\Clauses\Filters;

use Xofttion\Database\Sql\Filters\EqualGreater as EqualGreaterFilter;

final class EqualGreater extends Filter
{
    // Constructor de la clase EqualGreater

    private function __construct(
        string $column,
        string $value,
        ?string $union = null
    ) {
        $this->filter = EqualGreaterFilter::create($column);

        parent::__construct([$value], $union);
    }

    // Métodos estáticos de la clase EqualGreater

    public static function create(
        string $column,
        string $value,
        ?string $union = null
    ): self {
        return new static($column, $value, $union);
    }
}
