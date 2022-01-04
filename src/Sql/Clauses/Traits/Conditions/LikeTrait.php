<?php

namespace Xofttion\Database\Sql\Clauses\Traits\Conditions;

use Xofttion\Database\Sql\Clauses\Union;
use Xofttion\Database\Sql\Clauses\Conditions\Like;

trait LikeTrait
{
    // Métodos del trait LikeTrait

    public function like(
        string $column,
        string $value,
        bool $not = false
    ): void {
        $this->addLike($column, $value, Union::AND, $not);
    }

    public function orLike(
        string $column,
        string $value,
        bool $not = false
    ): void {
        $this->addLike($column, $value, Union::OR, $not);
    }

    private function addLike(
        string $column,
        string $value,
        string $unionValue,
        bool $not
    ): void {
        $union = $this->getUnion($unionValue);

        $condition = Like::create($column, $value, $union, $not);

        $this->conditions[] = $condition;
    }
}
