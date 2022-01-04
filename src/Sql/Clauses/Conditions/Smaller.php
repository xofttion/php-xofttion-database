<?php

namespace Xofttion\Database\Sql\Clauses\Conditions;

use Xofttion\Database\Sql\Conditions\Smaller as SmallerFilter;

final class Smaller extends Condition
{
    // Constructor de la clase Smaller

    private function __construct(
        string $column,
        string $value,
        ?string $union = null
    ) {
        $this->condition = SmallerFilter::create($column);

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
