<?php

namespace Xofttion\Database\Sql\Clauses;

use Xofttion\Database\Contracts\IClause;
use Xofttion\Database\Contracts\IValueSql;
use Xofttion\Database\Sql\ValueSql;

class GroupBy implements IClause
{
    // Atributos de la clase GroupBy

    private array $columns;

    // Constructor de la clase GroupBy

    private function __construct(array $columns)
    {
        $this->columns = $columns;
    }

    // Métodos estáticos de la clase GroupBy

    public static function create(array $columns): self
    {
        return new static($columns);
    }

    // Métodos sobrescritos de la interfaz IClause

    public function build(): IValueSql
    {
        $columns = implode(', ', $this->columns);

        $command = "GROUP BY {$columns}";

        return ValueSql::create($command);
    }
}
