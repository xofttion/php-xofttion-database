<?php

namespace Xofttion\Database\Sql\Clauses;

use Xofttion\Database\Contracts\IClause;
use Xofttion\Database\Contracts\IValueSql;
use Xofttion\Database\Sql\ValueSql;

class Limit implements IClause
{
    private int $count;

    private int $offset;

    private function __construct(int $count, int $offset = 0)
    {
        $this->count = $count;
        $this->offset = $offset;
    }

    public static function create(int $count, int $offset = 0): self
    {
        return new static($count, $offset);
    }

    public function build(): IValueSql
    {
        $command = "LIMIT {$this->offset}, {$this->count}";

        return ValueSql::create($command);
    }
}
