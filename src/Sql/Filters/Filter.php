<?php

namespace Xofttion\Database\Sql\Filters;

use Xofttion\Database\Contracts\IFilter;

class Filter implements IFilter
{
    // Atributos de la clase Filter

    protected string $column;

    protected string $operator;

    protected bool $not;

    // Constructor de la clase Filter

    protected function __construct(
        string $column,
        string $operator,
        bool $not = false
    ) {
        $this->column = $column;
        $this->operator = $operator;
        $this->not = $not;
    }

    // Métodos de la clase Filter

    public function getOperator(): string
    {
        return $this->operator;
    }

    public function getNot(): string
    {
        return !$this->not ? '' : ' NOT ';
    }

    protected function getValue(): string
    {
        return '?';
    }

    // Métodos sobrescritos de la interfaz IFilter

    public function getColumn(): string
    {
        return $this->column;
    }

    public function build(): string
    {
        $column = $this->getColumn();
        $not = $this->getNot();
        $operator = $this->getOperator();
        $value = $this->getValue();

        $filter = "{$column} {$not} {$operator} {$value}";

        return $filter;
    }
}
