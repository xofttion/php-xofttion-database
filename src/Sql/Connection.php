<?php

namespace Xofttion\Database\Sql;

use PDO;
use PDOStatement;
use Xofttion\Database\Contracts\IConnection;
use Xofttion\Database\Contracts\ISentence;
use Xofttion\Database\Sql\Sentences\DML\Sentence;
use Xofttion\Database\Sql\Utils\Result;

class Connection implements IConnection
{
    // Atributos de la clase Connection

    protected string $driver;

    protected string $host;

    protected ?string $port;

    protected ?string $database;

    protected string $user;

    protected string $password;

    private ?PDO $connection;

    // Constructor de la clase Connection

    protected function __construct(
        string $driver,
        string $host,
        ?string $port,
        ?string $database,
        string $user,
        string $password
    ) {
        $this->driver = $driver;
        $this->host = $host;
        $this->port = $port;
        $this->database = $database;
        $this->user = $user;
        $this->password = $password;
    }

    // Métodos sobrescritos de la interfaz IConnection

    public function open(): void
    {
        $url = $this->getUrl();
        $user = $this->user;
        $password = $this->password;

        $connection = new PDO($url, $user, $password);

        $this->connection = $connection;
    }

    public function close(): void
    {
        $this->connection = null;
    }

    public function transaction(): void
    {
        if ($this->isConnect()) {
            $this->connection->beginTransaction();
        }
    }

    public function commit(): void
    {
        if ($this->isConnect()) {
            $this->connection->commit();
        }
    }

    public function rollback(): void
    {
        if ($this->isConnect()) {
            $this->connection->rollBack();
        }
    }

    public function execute(ISentence $sentence)
    {
        if (!$this->isConnect()) {
            return null;
        }

        $sql = $sentence->build();

        $statement = $this->connection->prepare($sql->getCommand());
        $statement->execute($sql->getValues());

        $values = $this->resultSet($sentence, $statement);

        $statement = null;

        return $values;
    }

    private function resultSet(ISentence $sentence, PDOStatement $statement): array
    {
        switch ($sentence->type()) {
            case (Sentence::SELECT):
                return $this->fetchAll($statement);

            case (Sentence::UPDATE):
                return $this->rowsCount($statement);

            case (Sentence::DELETE):
                return $this->rowsCount($statement);

            default:
                return [];
        }
    }

    private function fetchAll(PDOStatement $statement): array
    {
        $results = $statement->fetchAll();

        $values = [];

        foreach ($results as $result) {
            $values[] = new Result($result);
        }

        return $values;
    }

    private function rowsCount(PDOStatement $statement): array
    {
        $result = new Result([
            'rows' => $statement->rowCount()
        ]);

        return [$result];
    }

    // Métodos de la clase Connection

    protected function getUrl(): string
    {
        $url = "{$this->driver}:host={$this->host}";

        if (is_defined($this->port)) {
            $url = "{$url};port={$this->port}";
        }

        if (is_defined($this->database)) {
            $url = "{$url};dbname={$this->database}";
        }

        return $url;
    }

    private function isConnect(): bool
    {
        return is_defined($this->connection);
    }
}
