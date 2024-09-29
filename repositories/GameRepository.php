<?php

namespace Repositories;

require_once __DIR__ . '/../models/games/Game.php';
require_once __DIR__ . '/../models/games/GameRating.php';

use Game;
use GameRating;
use PDO;
use PDOException;

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

    public function getCountGames(): int {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as count FROM games");
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) $result['count'];
    }

    public function createGame(Game $game): bool {
        $stmt = $this->pdo->prepare("INSERT INTO games (title, developer, genre, description, release_year) 
                                 VALUES (:title, :developer, :genre, :description, :release_year)");

        $title = $game->getTitle();
        $developer = $game->getDeveloper();
        $genre = $game->getGenre();
        $description = $game->getDescription();
        $releaseYear = $game->getReleaseYear();

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':developer', $developer);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':release_year', $releaseYear);

        try {
            return $stmt->execute();
        } catch (PDOException) {
            return false;
        }
    }

    public function findGameById(int $gameId): ?Game
    {
        $stmt = $this->pdo->prepare("SELECT * FROM games WHERE id = :id");
        $stmt->bindParam(':id', $gameId, PDO::PARAM_INT);

        try {
            $stmt->execute();
            $gameData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($gameData) {
                return new Game(
                    $gameData['id'],
                    $gameData['title'],
                    $gameData['developer'],
                    $gameData['genre'],
                    $gameData['description'],
                    $gameData['release_year']
                );
            } else {
                return null;
            }
        } catch (PDOException) {

            return null;
        }
    }

    public function saveRating(int $userId, int $gameId, int $ratingValue): bool
    {
        $checkStmt = $this->pdo->prepare("SELECT COUNT(*) FROM user_ratings WHERE user_id = :userId AND game_id = :gameId");
        $checkStmt->bindParam(':userId', $userId, \PDO::PARAM_INT);
        $checkStmt->bindParam(':gameId', $gameId, \PDO::PARAM_INT);
        $checkStmt->execute();
        $existingRatingCount = $checkStmt->fetchColumn();

        if ($existingRatingCount > 0) {
            return false;
        }

        try {
            $sql = "INSERT INTO user_ratings (user_id, game_id, rating) VALUES (:userId, :gameId, :ratingValue)";

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':userId', $userId, \PDO::PARAM_INT);
            $stmt->bindParam(':gameId', $gameId, \PDO::PARAM_INT);
            $stmt->bindParam(':ratingValue', $ratingValue, \PDO::PARAM_INT);

            $stmt->execute();

            return true;
        } catch (PDOException) {
            return false;
        }
    }

    public function gameExists(int $gameId): bool
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM games WHERE id = :gameId");
        $stmt->bindParam(':gameId', $gameId, PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->fetchColumn();

        return $count > 0;
    }

    public function getRatedGamesByUserId(int $userId): array {
        $stmt = $this->pdo->prepare("
        SELECT 
            g.id AS game_id,
            g.title AS game_title,
            g.developer AS game_developer,
            g.genre AS game_genre,
            g.description AS game_description,
            g.release_year AS game_release_year,
            r.rating
        FROM games g 
        JOIN user_ratings r ON g.id = r.game_id
        WHERE r.user_id = :userId
    ");
        $stmt->bindParam(':userId', $userId, \PDO::PARAM_INT);
        $stmt->execute();

        $ratedGames = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $gameRating = new GameRating(
                $row['game_id'],
                $row['game_title'],
                $row['game_developer'],
                $row['game_genre'],
                $row['game_description'],
                $row['game_release_year'],
                $row['rating']
            );
            $ratedGames[] = $gameRating;
        }

        return $ratedGames;
    }
}