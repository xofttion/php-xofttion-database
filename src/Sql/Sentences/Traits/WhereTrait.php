<?php

namespace Xofttion\Database\Sql\Sentences\Traits;

use Xofttion\Database\Sql\Clauses\Where;

trait WhereTrait
{
    private ?Where $where = null;

    public function where(): Where
    {
        if (is_null($this->where)) {
            $this->where = Where::create();
        }

        return $this->where;
    }

    private function hasWhere(): bool
    {
        if (is_null($this->where)) {
            return false;
        }

        return !$this->where->isEmpty();
    }
}
