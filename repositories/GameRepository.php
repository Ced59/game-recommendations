<?php

namespace Repositories;

require_once __DIR__ . '/../models/games/Game.php';

use Game;
use PDO;

class GameRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function getAllGames(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM games");
        $stmt->execute();

        $gamesData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $games = [];

        foreach ($gamesData as $gameData) {
            $game = new Game(
                $gameData['id'],
                $gameData['title'],
                $gameData['developer'],
                $gameData['genre'],
                $gameData['description'],
                $gameData['release_year']
            );
            $games[] = $game;
        }

        return $games;
    }
}