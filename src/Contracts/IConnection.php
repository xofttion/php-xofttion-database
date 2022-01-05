<?php

namespace Xofttion\Database\Contracts;

interface IConnection
{
    // Métodos de la interfaz IConnection

    public function open(): void;

    public function close(): void;

    public function transaction(): void;

    public function commit(): void;

    public function rollback(): void;

    public function execute(ISentence $sentence);
}
