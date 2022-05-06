<?php

namespace Xofttion\Database\Sql;

use Xofttion\Database\Contracts\IValueSql;

class ValueSql implements IValueSql
{
    private string $command;

    private array $values;

    private function __construct(string $command, array $values = [])
    {
        $this->setCommand($command);
        $this->setValues($values);
    }

    private function setCommand(string $command): void
    {
        $this->command = $command;
    }

    private function setValues(array $values): void
    {
        $this->values = $values;
    }

    public static function create(string $command, array $values = []): self
    {
        return new static($command, $values);
    }

    public function getCommand(): string
    {
        return $this->command;
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function merge(IValueSql $sql): void
    {
        $command = "{$this->command} {$sql->getCommand()}";

        $values = array_merge($this->values, $sql->getValues());

        $this->setValues($values);
        $this->setCommand($command);
    }
}
