<?php

namespace Xofttion\Database\Contracts;

interface ISentence
{
    // Métodos de la interfaz ISentence

    public function build(): IValueSql;
}
