<?php

namespace Framework\Helpers;

use PDO;

class Database
{

    public const SELECT_ALL = "SELECT_ALL";
    public const SELECT_ONE = "SELECT_ONE";

    private Database $db;
    private PDO $pdo;

    private static string $model;

    public function __construct()
    {
        $this->pdo = $this->pdo ?? new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=". DBCHARSET, DBUSER, DBPASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]);
        $this->db = $this;
    }

    public function getDb(): Database
    {
        return $this->db;
    }

    private function getPdo(): PDO
    {
        return $this->pdo;
    }

    public static function setModel(string $model): void
    {
        self::$model = $model;
    }

    private static function getModel(): string
    {
        return self::$model;
    }

    public function runQuery(string $query, string $mode = "SELECT_ALL", array $datas = [])
    {
        switch ($mode) {
            case Database::SELECT_ALL:
                $request = $this->getPdo()->prepare($query);
                $request->setFetchMode(PDO::FETCH_CLASS, self::getModel());
                $request->execute();
                return $request->fetchAll();
                break;
            case Database::SELECT_ONE:
                $request = $this->getPdo()->prepare($query);
                $request->setFetchMode(PDO::FETCH_CLASS, self::getModel());
                $request->execute($datas);
                return $request->fetch();
                break;
            
            default:
                # code...
                break;
        }
    }
}
