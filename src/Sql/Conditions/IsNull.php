<?php

namespace Xofttion\Database\Sql\Conditions;

final class IsNull extends Condition
{
    private function __construct(string $column)
    {
        parent::__construct($column, 'IS');
    }

    public static function create(string $column): self
    {
        return new static($column);
    }

    public function getValue(): string
    {
        return 'NULL';
    }
}
