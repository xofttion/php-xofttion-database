<?php

namespace Xofttion\Database\Sql\Conditions;

final class Like extends Condition
{
    private function __construct(string $column, bool $not = false)
    {
        parent::__construct($column, 'LIKE', $not);
    }

    public static function create(string $column, bool $not = false): self
    {
        return new static($column, $not);
    }
}
