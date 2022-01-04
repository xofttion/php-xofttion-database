<?php

namespace Xofttion\Database\Sql\Clauses\Conditions;

use Xofttion\Database\Sql\Conditions\Like as LikeFilter;

final class Like extends Condition
{
    // Constructor de la clase Like

    private function __construct(
        string $column,
        string $value,
        ?string $union = null,
        bool $not = false
    ) {
        $this->condition = LikeFilter::create($column, $not);

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
