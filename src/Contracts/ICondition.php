<?php

namespace Xofttion\Database\Contracts;

interface ICondition
{
    // Métodos de la interfaz ICondition

    public function getColumn(): string;

    public function build(): string;
}
