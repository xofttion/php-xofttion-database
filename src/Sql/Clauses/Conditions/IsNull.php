<?php

namespace Xofttion\Database\Sql\Clauses\Conditions;

use Xofttion\Database\Sql\Conditions\IsNull as IsNullFilter;

final class IsNull extends Condition
{
    // Constructor de la clase IsNull

    private function __construct(string $column, ?string $union = null)
    {
        $this->condition = IsNullFilter::create($column);

        parent::__construct([], $union);
    }

    // Métodos estáticos de la clase IsNull

    public static function create(string $column, ?string $union = null): self
    {
        return new static($column, $union);
    }
}
