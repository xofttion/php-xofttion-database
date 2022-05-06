<?php

namespace Xofttion\Database\Sql\Conditions;

final class EqualSmaller extends Condition
{
    private function __construct(string $column)
    {
        parent::__construct($column, '<=');
    }

    public static function create(string $column): self
    {
        return new static($column);
    }
}
