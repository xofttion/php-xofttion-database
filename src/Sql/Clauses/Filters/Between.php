<?php

namespace Xofttion\Database\Sql\Clauses\Filters;

use Xofttion\Database\Sql\Filters\Between as BetweenFilter;

final class Between extends Filter
{
    // Constructor de la clase Between

    private function __construct(
        string $column,
        string $from,
        string $until,
        ?string $union = null,
        bool $not = false
    ) {
        $this->filter = BetweenFilter::create($column, $not);

        parent::__construct([$from, $until], $union);
    }

    // Métodos estáticos de la clase Between

    public static function create(
        string $column,
        string $from,
        string $until,
        ?string $union = null,
        bool $not = false
    ): self {
        return new static($column, $from, $until, $union, $not);
    }
}
