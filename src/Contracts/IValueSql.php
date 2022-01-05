<?php

namespace Xofttion\Database\Contracts;

interface IValueSql
{
    // Métodos de la interfaz IValueSql

    public function getCommand(): string;

    public function getValues(): array;

    public function merge(IValueSql $sql): void;
}
