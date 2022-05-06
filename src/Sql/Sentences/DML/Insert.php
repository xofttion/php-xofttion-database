<?php

namespace Xofttion\Database\Sql\Sentences\DML;

use Xofttion\Database\Contracts\IValueSql;
use Xofttion\Database\Sql\ValueSql;

class Insert extends Sentence
{
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
        $command = "INSERT INTO {$this->getTable()}";

        $keys = array_keys($this->values);
        $count = count($keys);

        $values = [];

        $columns = implode(', ', $keys);
        $props = str_repeat('?,', $count - 1);

        foreach ($keys as $key) {
            $values[] = $this->values[$key];
        }

        $command = "{$command} ({$columns})";
        $command = "{$command} VALUES ({$props}?)";

        $sql = ValueSql::create($command, $values);

        return $sql;
    }

    public function type(): int
    {
        return self::INSERT;
    }
}
