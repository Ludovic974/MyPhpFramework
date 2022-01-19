<?php

namespace Framework\App\Repositories;

use Framework\App\Interfaces\BaseRepositoryInterface;
use Framework\Helpers\Database;

class BaseRepositories extends Database implements BaseRepositoryInterface
{
    private string $table;

    private string $q;

    public function setTable(string $table): void
    {
        $this->table = DBPREFIX . trim($table);
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function setQuery(string $query): void
    {
        $this->q = trim($query);
    }

    public function getQuery(): string
    {
        return $this->q;
    }

    public function all(array $orderBy = [])
    {
        $this->setQuery("SELECT * FROM {$this->getTable()}");
        if (!empty($orderBy)) $this->q .= " ORDER BY {$orderBy[0]} {$orderBy[1]}";
        return $this->getDb()->runQuery($this->getQuery());
    }

    public function single(string $columName, int|string $id)
    {
        $this->setQuery("SELECT * FROM {$this->getTable()} WHERE :{$columName}=:{$columName}");
        return $this->getDb()->runQuery($this->getQuery(), Database::SELECT_ONE, [$columName => $id]);
    }
}
