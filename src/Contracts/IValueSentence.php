<?php

namespace Xofttion\Database\Contracts;

interface IValueSentence
{
    // Métodos de la interfaz IValueSentence

    public function getSql(): string;

    public function getValues(): array;
}
