<?php

namespace Xofttion\Database\Sql\Sentences\Traits;

use Xofttion\Database\Sql\Clauses\OrderBy;

trait OrderByTrait
{
    // Atributos del trait OrderByTrait

    private ?OrderBy $orderBy = null;

    // Métodos del trait OrderByTrait

    public function orderBy(string $column, bool $asc = true): void
    {
        if (is_null($this->orderBy)) {
            $this->orderBy = OrderBy::create();
        }

        $this->orderBy->attach($column, $asc);
    }

    private function hasOrderBy(): bool
    {
        if (is_null($this->orderBy)) {
            return false;
        }

        return !$this->orderBy->isEmpty();
    }
}
