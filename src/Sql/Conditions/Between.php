<?php

namespace Xofttion\Database\Sql\Conditions;

final class Between extends Condition
{
    // Constructor de la clase Between

    private function __construct(string $column, bool $not = false)
    {
        parent::__construct($column, 'BETWEEN', $not);
    }

    // Métodos estáticos de la clase Between

    public static function create(string $column, bool $not = false): self
    {
        return new static($column, $not);
    }

    // Métodos sobrescritos de la clase Filter

    public function getValue(): string
    {
        return '? AND ?';
    }
}
