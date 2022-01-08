<?php

namespace Xofttion\Database\Sql\Sentences\DML;

use Xofttion\Database\Contracts\IValueSql;
use Xofttion\Database\Sql\ValueSql;
use Xofttion\Database\Sql\Sentences\Traits\GroupByTrait;
use Xofttion\Database\Sql\Sentences\Traits\HavingTrait;
use Xofttion\Database\Sql\Sentences\Traits\OrderByTrait;
use Xofttion\Database\Sql\Sentences\Traits\WhereTrait;

class Select extends Sentence
{
    use GroupByTrait;
    use HavingTrait;
    use OrderByTrait;
    use WhereTrait;

    // Atributos de la clase Select

    private bool $distinct = false;

    private array $columns;

    // Constructor de la clase Select

    private function __construct(string $table, array $columns = ['*'])
    {
        $this->columns = $columns;

        parent::__construct($table);
    }

    // Métodos de la clase Select

    public function enabledDistinct(): void
    {
        $this->distinct = true;
    }

    // Métodos estáticos de la clase Select

    public static function create(string $table, array $columns = ['*']): self
    {
        return new static($table, $columns);
    }

    // Métodos sobrescritos de la interfaz ISentence

    public function build(): IValueSql
    {
        $distinct = !$this->distinct ? '' : 'DISTINCT ';

        $columns = implode(', ', $this->columns);

        $command = "SELECT {$distinct} {$columns}";
        $command = "{$command} FROM {$this->getTable()}";

        $sql = ValueSql::create($command, []);

        if ($this->hasWhere()) {
            $sql->merge($this->where->build());
        }

        if ($this->hasGroupBy()) {
            $sql->merge($this->groupBy->build());
        }

        if ($this->hasHaving()) {
            $sql->merge($this->having->build());
        }

        if ($this->hasOrderBy()) {
            $sql->merge($this->orderBy->build());
        }

        return $sql;
    }
}
