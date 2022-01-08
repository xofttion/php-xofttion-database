<?php

namespace Xofttion\Database\Sql\Sentences\Traits;

use Xofttion\Database\Sql\Clauses\GroupBy;

trait GroupByTrait
{
    // Atributos del trait GroupByTrait

    private ?GroupBy $groupBy = null;

    // Métodos del trait GroupByTrait

    public function groupBy(array $columns): void
    {
        $this->groupBy = GroupBy::create($columns);
    }

    private function hasGroupBy(): bool
    {
        return is_defined($this->groupBy);
    }
}
