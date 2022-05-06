<?php

namespace Xofttion\Database\Sql\Clauses;

final class Where extends Filter
{
    public function __construct()
    {
        parent::__construct('WHERE');
    }

    public static function create(): self
    {
        return new static();
    }
}
