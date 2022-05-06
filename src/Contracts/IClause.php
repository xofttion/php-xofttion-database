<?php

namespace Xofttion\Database\Contracts;

interface IClause
{
    public function build(): IValueSql;
}
