<?php

namespace Xofttion\Database\Sql\Clauses;

use Xofttion\Database\Contracts\IClause;
use Xofttion\Database\Contracts\IValueSql;
use Xofttion\Database\Sql\ValueSql;

class GroupBy implements IClause
{
    private array $columns;

    private function __construct(array $columns)
    {
        $this->columns = $columns;
    }

    public static function create(array $columns): self
    {
        return new static($columns);
    }

    public function build(): IValueSql
    {
        $columns = implode(', ', $this->columns);

        $command = "GROUP BY {$columns}";

        return ValueSql::create($command);
    }
}
