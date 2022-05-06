<?php

namespace Xofttion\Database\Sql\Clauses\Conditions;

use Xofttion\Database\Sql\Conditions\Between as BetweenFilter;

final class Between extends Condition
{
    private function __construct(
        string $column,
        string $from,
        string $until,
        ?string $union = null,
        bool $not = false
    ) {
        $this->condition = BetweenFilter::create($column, $not);

        parent::__construct([$from, $until], $union);
    }

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
