<?php

namespace Xofttion\Database\Sql\Conditions;

final class In extends Condition
{
    // Atributos de la clase In

    private int $count;

    // Constructor de la clase In

    private function __construct(
        string $column,
        int $count,
        bool $not = false
    ) {
        $this->count = $count;

        parent::__construct($column, 'IN', $not);
    }

    // Métodos estáticos de la clase In

    public static function create(
        string $column,
        int $count,
        bool $not = false
    ): self {
        return new static($column, $count, $not);
    }

    // Métodos sobrescritos de la clase Filter

    public function getValue(): string
    {
        $value = str_repeat('?,', $this->count - 1);

        return "(${value}?)";
    }
}
