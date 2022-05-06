<?php

namespace Xofttion\Database\Sql\Sentences\Traits;

use Xofttion\Database\Sql\Clauses\Limit;

trait LimitTrait
{
    private ?Limit $limit = null;

    public function limit(int $count, int $offset = 0): void
    {
        $this->limit = Limit::create($count, $offset);
    }

    private function hasLimit(): bool
    {
        return is_defined($this->limit);
    }
}
