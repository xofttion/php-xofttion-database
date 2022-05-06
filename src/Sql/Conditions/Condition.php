<?php

namespace Xofttion\Database\Sql\Conditions;

use Xofttion\Database\Contracts\ICondition;

class Condition implements ICondition
{
    protected string $column;

    protected string $operator;

    protected bool $not;

    protected function __construct(
        string $column,
        string $operator,
        bool $not = false
    ) {
        $this->column = $column;
        $this->operator = $operator;
        $this->not = $not;
    }

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

        $Condition = "{$column} {$not} {$operator} {$value}";

        return $Condition;
    }
}
