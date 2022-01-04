<?php

namespace Xofttion\Database\Sql\Clauses\Conditions;

use Xofttion\Database\Sql\Conditions\IsNotNull as IsNotNullFilter;

final class IsNotNull extends Condition
{
    // Constructor de la clase IsNotNull

    private function __construct(string $column, ?string $union = null)
    {
        $this->condition = IsNotNullFilter::create($column);

        parent::__construct([], $union);
    }

    // Métodos estáticos de la clase IsNotNull

    public static function create(string $column, ?string $union = null): self
    {
        return new static($column, $union);
    }
}
