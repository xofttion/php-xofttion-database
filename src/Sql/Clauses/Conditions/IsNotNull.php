<?php

namespace Xofttion\Database\Sql\Clauses\Conditions;

use Xofttion\Database\Sql\Conditions\IsNotNull as IsNotNullFilter;

final class IsNotNull extends Condition
{
    private function __construct(string $column, ?string $union = null)
    {
        $this->condition = IsNotNullFilter::create($column);

        parent::__construct([], $union);
    }

    public static function create(string $column, ?string $union = null): self
    {
        return new static($column, $union);
    }
}
