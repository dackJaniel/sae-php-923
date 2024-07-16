<?php

define('DB_CONN', "mysql");
define('DB_HOST', 'mariadb');
define('DB_PORT', '3306');
define('DB_NAME', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_CHARSET', 'utf8mb4');

class Database
{
    private PDO $pdo;
    private PDOStatement $statement;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                DB_CONN . ":host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME,
                DB_USERNAME,
                DB_PASSWORD,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );
        } catch (PDOException $e) {
            die('Es konnte keine Datenbankverbindung aufgebaut werden: ' . $e->getMessage());
        }
    }

    public function query(string $sql, array $values = [])
    {
        $this->statement = $this->pdo->prepare($sql);
        try {
            $this->statement->execute($values);
        } catch (PDOException $e) {
            die("Es ist ein Fehler in der Datenbanktabelle aufgetreten: " . $e->getMessage());
        }
    }

    public function dbAllResults()
    {
        try {
            return $this->statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Die Daten konnten nicht geholt werden: " . $e->getMessage());
        }
    }
}