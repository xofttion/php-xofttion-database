<?php

namespace Xofttion\Database\Sql\Clauses;

final class Having extends Filter
{
    private function __construct()
    {
        parent::__construct('HAVING');
    }

    public static function create(): self
    {
        return new static();
    }
}
