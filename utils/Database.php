<?php

namespace Utils;

use PDO;

class Database {
    private static ?Database $instance = null;
    private PDO $_pdo;

    // Utilisation du Design Pattern Singleton pour n'avoir qu'une unique instance PDO.
    // Source: https://stackoverflow.com/questions/20019812/database-connection-with-pdo-and-singleton-class

    private function __construct() {
        $this->_pdo = new PDO('mysql:host=localhost;dbname=game_recommendations', 'root', '');
        $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance(): ?Database
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getPDO(): PDO{
        return $this->_pdo;
    }
}