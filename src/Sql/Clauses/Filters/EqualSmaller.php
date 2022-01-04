<?php

namespace Xofttion\Database\Sql\Clauses\Filters;

use Xofttion\Database\Sql\Filters\EqualSmaller as EqualSmallerFilter;

final class EqualSmaller extends Filter
{
    // Constructor de la clase EqualSmaller

    private function __construct(
        string $column,
        string $value,
        ?string $union = null
    ) {
        $this->filter = EqualSmallerFilter::create($column);

        parent::__construct([$value], $union);
    }

    // Métodos estáticos de la clase EqualSmaller

    public static function create(
        string $column,
        string $value,
        ?string $union = null
    ): self {
        return new static($column, $value, $union);
    }
}
