<?php

namespace Xofttion\Database\Contracts;

interface IClauseCondition
{
    // Métodos de la interfaz IClauseCondition

    public function getColumn(): string;

    public function build(): IValueSentence;
}
