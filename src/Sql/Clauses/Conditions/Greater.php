<?php

namespace Xofttion\Database\Sql\Clauses\Conditions;

use Xofttion\Database\Sql\Conditions\Greater as GreaterFilter;

final class Greater extends Condition
{
    // Constructor de la clase Greater

    private function __construct(
        string $column,
        string $value,
        ?string $union = null
    ) {
        $this->condition = GreaterFilter::create($column);

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
