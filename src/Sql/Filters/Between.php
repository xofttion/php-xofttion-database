<?php

namespace Xofttion\Database\Sql\Filters;

final class Between extends Filter
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
