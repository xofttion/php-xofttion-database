<?php

namespace Xofttion\Database\Sql\Clauses\Conditions;

use Xofttion\Database\Contracts\IClauseCondition;
use Xofttion\Database\Contracts\ICondition;
use Xofttion\Database\Contracts\IValueSentence;
use Xofttion\Database\Sql\ValueSentence;

class Condition implements IClauseCondition
{
    // Atributos de la clase Condition

    protected ICondition $condition;

    protected array $values;

    protected ?string $union;

    // Constructor de la clase Condition

    protected function __construct(array $values, ?string $union = null)
    {
        $this->values = $values;
        $this->union = $union;
    }

    // Métodos de la clase Condition

    public function getCondition(): ICondition
    {
        return $this->condition;
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function getUnion(): ?string
    {
        return $this->union;
    }

    // Métodos sobrescritos de la interfaz IClauseCondition

    public function getColumn(): string
    {
        return $this->condition->getColumn();
    }

    public function build(): IValueSentence
    {
        $sql = $this->condition->build();

        if (is_defined($this->union)) {
            $sql = "{$sql} {$this->union}";
        }

        $value = ValueSentence::create($sql, $this->values);

        return $value;
    }
}
