<?php

namespace Xofttion\Database\Sql\Sentences\DML;

use Xofttion\Database\Contracts\ISentence;
use Xofttion\Database\Contracts\IValueSql;
use Xofttion\Database\Sql\ValueSql;

class Sentence implements ISentence
{
    public const SELECT = 1;

    public const INSERT = 2;

    public const UPDATE = 3;

    public const DELETE = 4;

    private string $table;

    protected function __construct(string $table)
    {
        $this->table = $table;
    }

    protected function getTable(): string
    {
        return $this->table;
    }

    public function build(): IValueSql
    {
        return ValueSql::create('');
    }

    public function type(): int
    {
        return self::SELECT;
    }
}
