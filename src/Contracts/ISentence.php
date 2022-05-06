<?php

namespace Xofttion\Database\Contracts;

interface ISentence
{
    public function build(): IValueSql;

    public function type(): int;
}
