<?php

namespace Xofttion\Database\Sql\Clauses\Filters;

use Xofttion\Database\Sql\Filters\Equal as EqualFilter;

final class Equal extends Filter
{
    // Constructor de la clase Equal

    private function __construct(
        string $column,
        string $value,
        ?string $union = null
    ) {
        $this->filter = EqualFilter::create($column);

        parent::__construct([$value], $union);
    }

    // Métodos estáticos de la clase Equal

    public static function create(
        string $column,
        string $value,
        ?string $union = null
    ): self {
        return new static($column, $value, $union);
    }
}
