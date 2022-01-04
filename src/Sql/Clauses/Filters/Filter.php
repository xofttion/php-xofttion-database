<?php

namespace Xofttion\Database\Sql\Clauses\Filters;

use Xofttion\Database\Contracts\IClauseFilter;
use Xofttion\Database\Contracts\IFilter;
use Xofttion\Database\Contracts\IValueSentence;
use Xofttion\Database\Sql\ValueSentence;

class Filter implements IClauseFilter
{
    // Atributos de la clase Filter

    protected IFilter $filter;

    protected array $values;

    protected ?string $union;

    // Constructor de la clase Filter

    protected function __construct(array $values, ?string $union = null)
    {
        $this->values = $values;
        $this->union = $union;
    }

    // Métodos de la clase Filter

    public function getFilter(): IFilter
    {
        return $this->filter;
    }

    public function getValues(): array
    {
        return $this->values;
    }

    public function getUnion(): ?string
    {
        return $this->union;
    }

    // Métodos sobrescritos de la interfaz IClauseFilter

    public function getColumn(): string
    {
        return $this->filter->getColumn();
    }

    public function build(): IValueSentence
    {
        $sql = $this->filter->build();

        if (is_defined($this->union)) {
            $sql = "{$sql} {$this->union}";
        }

        $value = ValueSentence::create($sql, $this->values);

        return $value;
    }
}
