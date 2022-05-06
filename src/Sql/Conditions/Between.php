<?php

namespace Xofttion\Database\Sql\Conditions;

final class Between extends Condition
{
    private function __construct(string $column, bool $not = false)
    {
        parent::__construct($column, 'BETWEEN', $not);
    }

    public static function create(string $column, bool $not = false): self
    {
        return new static($column, $not);
    }

    public function getValue(): string
    {
        return '? AND ?';
    }
}
