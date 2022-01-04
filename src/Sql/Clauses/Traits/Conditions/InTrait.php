<?php

namespace Xofttion\Database\Sql\Clauses\Traits\Conditions;

use Xofttion\Database\Sql\Clauses\Union;
use Xofttion\Database\Sql\Clauses\Conditions\In;

trait InTrait
{
    // Métodos del trait InTrait

    public function in(
        string $column,
        array $values,
        bool $not = false
    ): void {
        $this->addIn($column, $values, Union::AND, $not);
    }

    public function orIn(
        string $column,
        array $values,
        bool $not = false
    ): void {
        $this->addIn($column, $values, Union::OR, $not);
    }

    private function addIn(
        string $column,
        array $values,
        string $unionValue,
        bool $not
    ): void {
        $union = $this->getUnion($unionValue);

        $condition = In::create($column, $values, $union, $not);

        $this->conditions[] = $condition;
    }
}
