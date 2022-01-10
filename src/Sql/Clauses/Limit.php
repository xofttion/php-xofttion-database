<?php

namespace Xofttion\Database\Sql\Clauses;

use Xofttion\Database\Contracts\IClause;
use Xofttion\Database\Contracts\IValueSql;
use Xofttion\Database\Sql\ValueSql;

class Limit implements IClause
{
    // Atributos de la clase Limit

    private int $count;

    private int $offset;

    // Constructor de la clase Limit

    private function __construct(int $count, int $offset = 0)
    {
        $this->count = $count;
        $this->offset = $offset;
    }

    // Métodos estáticos de la clase Limit

    public static function create(int $count, int $offset = 0): self
    {
        return new static($count, $offset);
    }

    // Métodos sobrescritos de la interfaz IClause

    public function build(): IValueSql
    {
        $command = "LIMIT {$this->offset}, {$this->count}";

        return ValueSql::create($command);
    }
}
