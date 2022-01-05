<?php

namespace Xofttion\Database\Sql\Clauses\Conditions;

use Xofttion\Database\Contracts\IClauseCondition;
use Xofttion\Database\Contracts\ICondition;
use Xofttion\Database\Contracts\IValueSql;
use Xofttion\Database\Sql\ValueSql;

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

    public function build(): IValueSql
    {
        $sql = $this->condition->build();

        if (is_defined($this->union)) {
            $sql = "{$this->union} {$sql}";
        }

        $value = ValueSql::create($sql, $this->values);

        return $value;
    }
}
