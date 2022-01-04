<?php

namespace Xofttion\Database\Sql\Clauses\Filters;

use Xofttion\Database\Sql\Filters\Like as LikeFilter;

final class Like extends Filter
{
    // Constructor de la clase Like

    private function __construct(
        string $column,
        string $value,
        ?string $union = null,
        bool $not = false
    ) {
        $this->filter = LikeFilter::create($column, $not);

        parent::__construct([$value], $union);
    }

    // Métodos estáticos de la clase Like

    public static function create(
        string $column,
        string $value,
        ?string $union = null,
        bool $not = false
    ): self {
        return new static($column, $value, $union, $not);
    }
}
