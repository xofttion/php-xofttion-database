<?php

namespace Xofttion\Database\Sql\Conditions;

final class In extends Condition
{
    private int $count;

    private function __construct(
        string $column,
        int $count,
        bool $not = false
    ) {
        $this->count = $count;

        parent::__construct($column, 'IN', $not);
    }

    public static function create(
        string $column,
        int $count,
        bool $not = false
    ): self {
        return new static($column, $count, $not);
    }

    public function getValue(): string
    {
        $value = str_repeat('?,', $this->count - 1);

        return "(${value}?)";
    }
}
