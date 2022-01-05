<?php

namespace Xofttion\Database\Sql\Clauses;

use DomainException;
use Xofttion\Database\Contracts\IFilter;
use Xofttion\Database\Contracts\IValueSql;
use Xofttion\Database\Sql\ValueSql;
use Xofttion\Database\Sql\Clauses\Traits\Conditions\BetweenTrait;
use Xofttion\Database\Sql\Clauses\Traits\Conditions\ConditionTrait;
use Xofttion\Database\Sql\Clauses\Traits\Conditions\InTrait;
use Xofttion\Database\Sql\Clauses\Traits\Conditions\LikeTrait;
use Xofttion\Database\Sql\Clauses\Traits\Conditions\NullTrait;

class Filter implements IFilter
{
    use BetweenTrait;
    use ConditionTrait;
    use InTrait;
    use LikeTrait;
    use NullTrait;

    // Constructor de la clase Where

    protected function __construct(string $name)
    {
        $this->name = $name;
        $this->conditions = [];
    }

    // Métodos de la clase Filter

    private function getUnion(string $value): ?string
    {
        return $this->isEmpty() ? null : $value;
    }

    public function isEmpty(): bool
    {
        return count($this->conditions) == 0;
    }

    // Métodos sobrescritos de la interfaz IFilter

    public function build(): IValueSql
    {
        if ($this->isEmpty()) {
            throw new DomainException('Clause Filter must contain at least one condition');
        }

        $sql = ValueSql::create("{$this->name}", []);

        foreach ($this->conditions as $condition) {
            $sql->merge($condition->build());
        }

        return $sql;
    }
}
