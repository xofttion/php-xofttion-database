<?php

namespace Xofttion\Database\Sql\Clauses\Traits\Conditions;

use Xofttion\Database\Sql\Clauses\Union;
use Xofttion\Database\Sql\Clauses\Conditions\Different;
use Xofttion\Database\Sql\Clauses\Conditions\Equal;
use Xofttion\Database\Sql\Clauses\Conditions\EqualGreater;
use Xofttion\Database\Sql\Clauses\Conditions\EqualSmaller;
use Xofttion\Database\Sql\Clauses\Conditions\Greater;
use Xofttion\Database\Sql\Clauses\Conditions\Smaller;

trait ConditionTrait
{
    public function equal(string $column, string $value): void
    {
        $this->addEqual($column, $value, Union::AND);
    }

    public function orEqual(string $column, string $value): void
    {
        $this->addEqual($column, $value, Union::OR);
    }

    public function equalGreater(string $column, string $value): void
    {
        $this->addEqualGreater($column, $value, Union::AND);
    }

    public function orEqualGreater(string $column, string $value): void
    {
        $this->addEqualGreater($column, $value, Union::OR);
    }

    public function equalSmaller(string $column, string $value): void
    {
        $this->addEqualSmaller($column, $value, Union::AND);
    }

    public function orEqualSmaller(string $column, string $value): void
    {
        $this->addEqualSmaller($column, $value, Union::OR);
    }

    public function different(string $column, string $value): void
    {
        $this->addDifferent($column, $value, Union::AND);
    }

    public function orDifferent(string $column, string $value): void
    {
        $this->addDifferent($column, $value, Union::OR);
    }

    public function greater(string $column, string $value): void
    {
        $this->addGreater($column, $value, Union::AND);
    }

    public function orGreater(string $column, string $value): void
    {
        $this->addGreater($column, $value, Union::OR);
    }

    public function smaller(string $column, string $value): void
    {
        $this->addSmaller($column, $value, Union::AND);
    }

    public function orSmaller(string $column, string $value): void
    {
        $this->addSmaller($column, $value, Union::OR);
    }

    private function addEqual(
        string $column,
        string $value,
        string $unionValue
    ): void {
        $union = $this->getUnion($unionValue);

        $condition = Equal::create($column, $value, $union);

        $this->conditions[] = $condition;
    }

    private function addEqualGreater(
        string $column,
        string $value,
        string $unionValue
    ): void {
        $union = $this->getUnion($unionValue);

        $condition = EqualGreater::create($column, $value, $union);

        $this->conditions[] = $condition;
    }

    private function addEqualSmaller(
        string $column,
        string $value,
        string $unionValue
    ): void {
        $union = $this->getUnion($unionValue);

        $condition = EqualSmaller::create($column, $value, $union);

        $this->conditions[] = $condition;
    }

    private function addDifferent(
        string $column,
        string $value,
        string $unionValue
    ): void {
        $union = $this->getUnion($unionValue);

        $condition = Different::create($column, $value, $union);

        $this->conditions[] = $condition;
    }

    private function addGreater(
        string $column,
        string $value,
        string $unionValue
    ): void {
        $union = $this->getUnion($unionValue);

        $condition = Greater::create($column, $value, $union);

        $this->conditions[] = $condition;
    }

    private function addSmaller(
        string $column,
        string $value,
        string $unionValue
    ): void {
        $union = $this->getUnion($unionValue);

        $condition = Smaller::create($column, $value, $union);

        $this->conditions[] = $condition;
    }
}
