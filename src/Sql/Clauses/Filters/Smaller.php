<?php

namespace Xofttion\Database\Sql\Clauses\Filters;

use Xofttion\Database\Sql\Filters\Smaller as SmallerFilter;

final class Smaller extends Filter
{
    // Constructor de la clase Smaller

    private function __construct(
        string $column,
        string $value,
        ?string $union = null
    ) {
        $this->filter = SmallerFilter::create($column);

        parent::__construct([$value], $union);
    }

    // Métodos estáticos de la clase Smaller

    public static function create(
        string $column,
        string $value,
        ?string $union = null
    ): self {
        return new static($column, $value, $union);
    }
}
