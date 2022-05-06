<?php

namespace Xofttion\Database\Sql\Connections;

use Xofttion\Database\Sql\Connection;

final class MySQL extends Connection
{
    private function __construct(array $config)
    {
        $driver = 'mysql';

        $host = $config['host'];
        $port = $config['port'];
        $database = $config['database'];
        $user = $config['user'];
        $password = $config['password'];

        parent::__construct($driver, $host, $port, $database, $user, $password);
    }

    public static function create(array $config): self
    {
        return new static($config);
    }
}
