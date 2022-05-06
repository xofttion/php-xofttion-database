<?php

namespace Xofttion\Database\Contracts;

interface IValueSql
{
    public function getCommand(): string;

    public function getValues(): array;

    public function merge(IValueSql $sql): void;
}
