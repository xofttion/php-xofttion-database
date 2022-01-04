<?php

namespace Xofttion\Database\Sql\Clauses\Traits\Conditions;

use Xofttion\Database\Sql\Clauses\Union;
use Xofttion\Database\Sql\Clauses\Conditions\Between;

trait BetweenTrait
{
    // Métodos del trait BetweenTrait

    public function between(
        string $column,
        string $from,
        string $until,
        bool $not = false
    ): void {
        $this->addBetween($column, $from, $until, Union::AND, $not);
    }

    public function orBetween(
        string $column,
        string $from,
        string $until,
        bool $not = false
    ): void {
        $this->addBetween($column, $from, $until, Union::OR, $not);
    }

    private function addBetween(
        string $column,
        string $from,
        string $until,
        string $unionValue,
        bool $not
    ): void {
        $union = $this->getUnion($unionValue);

        $condition = Between::create($column, $from, $until, $union, $not);

        $this->conditions[] = $condition;
    }
}
