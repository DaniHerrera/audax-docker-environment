<?php
namespace App\Database;
class DatabaseConnexion
{
    private static $instance;
    private $pdo;

    private function __construct() {
        // Configuración de conexión a la base de datos
        $host = 'mysql8-container';
        $dbname = 'Test_Audax';
        $port = '3306';
        $username = 'root';
        $password = 'secret';

        // Crear una instancia de PDO
        $this->pdo = new \PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DatabaseConnexion();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}