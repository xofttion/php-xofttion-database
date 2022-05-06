<?php

namespace Xofttion\Database\Contracts;

interface IClauseCondition
{
    public function getColumn(): string;

    public function build(): IValueSql;
}
