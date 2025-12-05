<?php

namespace mini_mvc\app\Core;

use PDO;

class Database
{
    /** @var PDO */
    private $dbh;
    private static $_instance;

    private function __construct()
    {
        $configData = parse_ini_file(__DIR__ . '/../config.ini');

        $port = isset($configData['DB_PORT']) && $configData['DB_PORT'] !== '' ? $configData['DB_PORT'] : 5432;
        $dsn = "pgsql:host={$configData['DB_HOST']};port={$port};dbname={$configData['DB_NAME']};options='--client_encoding=UTF8'";

        try {
            $this->dbh = new PDO(
                $dsn,
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (\Exception $exception) {
            echo 'Erreur de connexion PostgreSQL...<br>';
            echo $exception->getMessage() . '<br>';
            echo '<pre>' . $exception->getTraceAsString() . '</pre>';
            exit;
        }
    }

    public static function getPDO()
    {
        if (empty(self::$_instance)) {
            self::$_instance = new Database();
        }
        return self::$_instance->dbh;
    }
}
