<?php

namespace Xofttion\Database\Sql\Clauses;

use Xofttion\Database\Contracts\IClause;
use Xofttion\Database\Contracts\IValueSql;
use Xofttion\Database\Sql\ValueSql;

final class OrderBy implements IClause
{
    // Atributos de la clase OrderBy

    private array $columms;

    // Constructor de la clase OrderBy

    private function __construct()
    {
    }

    // Métodos estáticos de la clase OrderBy

    public static function create(): self
    {
        return new static();
    }

    // Métodos de la clase OrderBy

    public function attach(string $column, bool $asc = true)
    {
        $ascValue = $asc ? 'ASC' : 'DESC';

        $this->columms[] = "{$column} {$ascValue}";
    }

    public function isEmpty(): bool
    {
        return count($this->columms) == 0;
    }

    // Métodos sobrescritos de la interfaz IClause

    public function build(): IValueSql
    {
        $columns = implode(', ', $this->columms);

        $command = "ORDER BY {$columns}";

        return ValueSql::create($command);
    }
}
