<?php

namespace Xofttion\Database\Sql\Sentences\DML;

use Xofttion\Database\Contracts\IValueSql;
use Xofttion\Database\Sql\ValueSql;
use Xofttion\Database\Sql\Clauses\Where;

class Select extends Sentence
{
    private array $columns;

    private ?Where $where = null;

    // Constructor de la clase Select

    private function __construct(string $table, array $columns = ['*'])
    {
        $this->columns = $columns;

        parent::__construct($table);
    }

    // Métodos de la clase Select

    public function where(): Where
    {
        if (is_null($this->where)) {
            $this->where = Where::create();
        }

        return $this->where;
    }

    private function hasWhere(): bool
    {
        if (is_null($this->where)) {
            return false;
        }

        return !$this->where->isEmpty();
    }

    // Métodos estáticos de la clase Select

    public static function create(string $table, array $columns = ['*']): self
    {
        return new static($table, $columns);
    }

    // Métodos sobrescritos de la interfaz ISentence

    public function build(): IValueSql
    {
        $columns = implode(', ', $this->columns);

        $command = "SELECT {$columns} FROM {$this->getTable()}";

        $sql = ValueSql::create($command, []);

        if ($this->hasWhere()) {
            $sql->merge($this->where->build());
        }

        return $sql;
    }
}
