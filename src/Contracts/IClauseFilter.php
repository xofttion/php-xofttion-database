<?php

namespace Xofttion\Database\Contracts;

interface IClauseFilter
{
    // Métodos de la interfaz IClauseFilter

    public function getColumn(): string;

    public function build(): IValueSentence;
}
