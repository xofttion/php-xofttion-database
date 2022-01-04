<?php

namespace Xofttion\Database\Contracts;

interface IFilter
{
    // Métodos de la interfaz IFilter

    public function getColumn(): string;

    public function build(): string;
}
