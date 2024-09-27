<?php

namespace Repositories;

use PDO;

class GameRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function getAllGames(): false|array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM games");
        var_dump($this->pdo);
        var_dump($stmt);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}