<?php

namespace Xofttion\Database\Sql\Sentences\DML;

use Xofttion\Database\Contracts\IValueSql;
use Xofttion\Database\Sql\ValueSql;
use Xofttion\Database\Sql\Sentences\Traits\WhereTrait;

class Update extends Sentence
{
    use WhereTrait;

    private array $values;

    private function __construct(string $table, array $values)
    {
        $this->values = $values;

        parent::__construct($table);
    }

    public static function create(string $table, array $values): self
    {
        return new static($table, $values);
    }

    public function build(): IValueSql
    {
        $command = "UPDATE {$this->getTable()} SET";

        $values = [];
        $start = ' ';

        $keys = array_keys($this->values);

        foreach ($keys as $key) {
            $command = "{$command}{$start}{$key}=?";

            $start = ', ';

            $values[] = $this->values[$key];
        }

        $sql = ValueSql::create($command, $values);

        if ($this->hasWhere()) {
            $sql->merge($this->where->build());
        }

        return $sql;
    }

    public function type(): int
    {
        return self::UPDATE;
    }
}
