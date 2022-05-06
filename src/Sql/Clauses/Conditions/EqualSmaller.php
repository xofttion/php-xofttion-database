<?php

namespace Xofttion\Database\Sql\Clauses\Conditions;

use Xofttion\Database\Sql\Conditions\EqualSmaller as EqualSmallerFilter;

final class EqualSmaller extends Condition
{
    private function __construct(
        string $column,
        string $value,
        ?string $union = null
    ) {
        $this->condition = EqualSmallerFilter::create($column);

        parent::__construct([$value], $union);
    }

    public static function create(
        string $column,
        string $value,
        ?string $union = null
    ): self {
        return new static($column, $value, $union);
    }
}
