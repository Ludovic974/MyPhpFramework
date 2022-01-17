<?php

namespace Framework\Helpers;

use PDO;

class Database
{

    private PDO $pdo;

    public function __construct(private string $dbName, private string $dbHost, private string $dbUser, private string $dbPass, private string $charset)
    {
        $this->pdo = $this->pdo ?? new PDO("mysql:host={$this->dbHost};dbname={$this->dbName};charset={$this->charset}", $this->dbUser, $this->dbPass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::ATTR_DEFAULT_FETCH_MODE,
        ]);
    }

    public function getDb(): PDO
    {
        return $this->pdo;
    }
}
