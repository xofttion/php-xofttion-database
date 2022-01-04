<?php

namespace Xofttion\Database\Sql\Clauses\Conditions;

use Xofttion\Database\Sql\Conditions\In as InFilter;

final class In extends Condition
{
    // Constructor de la clase In

    private function __construct(
        string $column,
        array $values,
        ?string $union = null,
        bool $not = false
    ) {
        $count = count($values);

        $this->condition = InFilter::create($column, $count, $not);

        parent::__construct($values, $union);
    }

    // Métodos estáticos de la clase In

    public static function create(
        string $column,
        array $values,
        ?string $union = null,
        bool $not = false
    ): self {
        return new static($column, $values, $union, $not);
    }
}
