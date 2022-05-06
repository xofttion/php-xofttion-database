<?php

namespace Xofttion\Database\Contracts;

interface ICondition
{
    public function getColumn(): string;

    public function build(): string;
}
