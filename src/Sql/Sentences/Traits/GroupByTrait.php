<?php

namespace Xofttion\Database\Sql\Sentences\Traits;

use Xofttion\Database\Sql\Clauses\GroupBy;

trait GroupByTrait
{
    private ?GroupBy $groupBy = null;

    public function groupBy(array $columns): void
    {
        $this->groupBy = GroupBy::create($columns);
    }

    private function hasGroupBy(): bool
    {
        return is_defined($this->groupBy);
    }
}
