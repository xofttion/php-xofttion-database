<?php

namespace Xofttion\Database\Sql\Sentences\DML;

use Xofttion\Database\Contracts\ISentence;
use Xofttion\Database\Contracts\IValueSql;
use Xofttion\Database\Sql\ValueSql;

class Sentence implements ISentence
{
    // Constantes de la clase Sentence

    public const SELECT = 1;

    public const INSERT = 2;

    public const UPDATE = 3;

    public const DELETE = 4;

    // Atributos de la clase Sentence

    private string $table;

    // Constructor de la clase Sentence

    protected function __construct(string $table)
    {
        $this->table = $table;
    }

    // Métodos de la clase Sentence

    protected function getTable(): string
    {
        return $this->table;
    }

    // Métodos sobrescritos de la interfaz ISentence

    public function build(): IValueSql
    {
        return ValueSql::create('');
    }

    public function type(): int
    {
        return self::SELECT;
    }
}
