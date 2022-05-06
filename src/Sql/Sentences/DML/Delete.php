<?php

namespace Xofttion\Database\Sql\Sentences\DML;

use Xofttion\Database\Contracts\IValueSql;
use Xofttion\Database\Sql\ValueSql;
use Xofttion\Database\Sql\Sentences\Traits\WhereTrait;

class Delete extends Sentence
{
    use WhereTrait;

    private function __construct(string $table)
    {
        parent::__construct($table);
    }

    public static function create(string $table): self
    {
        return new static($table);
    }

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
