<?php

namespace Xofttion\Database\Sql;

use Xofttion\Database\Contracts\IValueSentence;

class ValueSentence implements IValueSentence
{
    // Atributos de la clase ValueSentence

    private string $sql;

    private array $values;

    // Constructor de la clase ValueSentence

    private function __construct(string $sql, array $values = [])
    {
        $this->sql = $sql;
        $this->values = $values;
    }

    // Métodos estáticos de la clase ValueSentence

    public static function create(string $sql, array $values = []): self
    {
        return new static($sql, $values);
    }

    // Métodos de la interfaz IValueSentence

    public function getSql(): string
    {
        return $this->sql;
    }

    public function getValues(): array
    {
        return $this->values;
    }
}
