<?php

namespace Xofttion\Database\Sql\Sentences\DML;

use Xofttion\Database\Contracts\IValueSql;
use Xofttion\Database\Sql\ValueSql;
use Xofttion\Database\Sql\Sentences\Traits\WhereTrait;

class Delete extends Sentence
{
    use WhereTrait;

    // Constructor de la clase Delete

    private function __construct(string $table)
    {
        parent::__construct($table);
    }

    // Métodos estáticos de la clase Delete

    public static function create(string $table): self
    {
        return new static($table);
    }

    // Métodos sobrescritos de la interfaz ISentence

    public function build(): IValueSql
    {
        $command = "DELETE FROM {$this->getTable()}";

        $sql = ValueSql::create($command);

        if ($this->hasWhere()) {
            $sql->merge($this->where->build());
        }

        return $sql;
    }

    public function type(): int
    {
        return self::DELETE;
    }
}
