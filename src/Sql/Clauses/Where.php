<?php

namespace Xofttion\Database\Sql\Clauses;

final class Where extends Filter
{
    // Constructor de la clase Where

    private function __construct()
    {
        parent::__construct('WHERE');
    }

    // Métodos estáticos de la clase Where

    public static function create(): self
    {
        return new static();
    }
}
