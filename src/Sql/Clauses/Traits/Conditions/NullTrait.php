<?php

namespace Xofttion\Database\Sql\Clauses\Traits\Conditions;

use Xofttion\Database\Sql\Clauses\Union;
use Xofttion\Database\Sql\Clauses\Conditions\IsNotNull;
use Xofttion\Database\Sql\Clauses\Conditions\IsNull;

trait NullTrait
{
    // Métodos del trait NullTrait

    public function isNull(string $column, bool $not = false): void
    {
        $this->addIsNull($column, Union::AND, $not);
    }

    public function orIsNull(string $column, bool $not = false): void
    {
        $this->addIsNull($column, Union::OR, $not);
    }

    public function isNotNull(string $column, bool $not = false): void
    {
        $this->addIsNotNull($column, Union::AND, $not);
    }

    public function orIsNotNull(string $column, bool $not = false): void
    {
        $this->addIsNotNull($column, Union::OR, $not);
    }

    private function addIsNull(
        string $column,
        string $unionValue,
        bool $not
    ): void {
        $union = $this->getUnion($unionValue);

        $condition = IsNull::create($column, $union, $not);

        $this->conditions[] = $condition;
    }

    private function addIsNotNull(
        string $column,
        string $unionValue,
        bool $not
    ): void {
        $union = $this->getUnion($unionValue);

        $condition = IsNotNull::create($column, $union, $not);

        $this->conditions[] = $condition;
    }
}
