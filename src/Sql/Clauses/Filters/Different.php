<?php

namespace Xofttion\Database\Sql\Clauses\Filters;

use Xofttion\Database\Sql\Filters\Different as DifferentFilter;

final class Different extends Filter
{
    // Constructor de la clase Different

    private function __construct(
        string $column,
        string $value,
        ?string $union = null
    ) {
        $this->filter = DifferentFilter::create($column);

        parent::__construct([$value], $union);
    }

    // Métodos estáticos de la clase Different

    public static function create(
        string $column,
        string $value,
        ?string $union = null
    ): self {
        return new static($column, $value, $union);
    }
}
