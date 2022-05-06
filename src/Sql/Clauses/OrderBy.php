<?php

namespace Xofttion\Database\Sql\Clauses;

use Xofttion\Database\Contracts\IClause;
use Xofttion\Database\Contracts\IValueSql;
use Xofttion\Database\Sql\ValueSql;

final class OrderBy implements IClause
{
    private array $columms;

    private function __construct()
    {
    }

    public static function create(): self
    {
        return new static();
    }

    public function attach(string $column, bool $asc = true)
    {
        $ascValue = $asc ? 'ASC' : 'DESC';

        $this->columms[] = "{$column} {$ascValue}";
    }

    public function isEmpty(): bool
    {
        return count($this->columms) == 0;
    }

    public function build(): IValueSql
    {
        $columns = implode(', ', $this->columms);

        $command = "ORDER BY {$columns}";

        return ValueSql::create($command);
    }
}
