<?php

namespace Xofttion\Database\Contracts;

use Xofttion\Database\Sql\Utils\ResultSet;

interface IConnection
{
    public function open(): void;

    public function close(): void;

    public function transaction(): void;

    public function commit(): void;

    public function rollback(): void;

    public function execute(ISentence $sentence): ResultSet;
}
