<?php

namespace Xofttion\Database\Sql\Clauses;

final class Having extends Filter
{
    // Constructor de la clase Having

    private function __construct()
    {
        parent::__construct('HAVING');
    }

    // Métodos estáticos de la clase Having

    public static function create(): self
    {
        return new static();
    }
}
