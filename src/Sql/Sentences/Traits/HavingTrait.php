<?php

namespace Xofttion\Database\Sql\Sentences\Traits;

use Xofttion\Database\Sql\Clauses\Having;

trait HavingTrait
{
    private ?Having $having = null;

    public function having(): Having
    {
        if (is_null($this->having)) {
            $this->having = Having::create();
        }

        return $this->having;
    }

    private function hasHaving(): bool
    {
        if (is_null($this->having)) {
            return false;
        }

        return !$this->having->isEmpty();
    }
}
