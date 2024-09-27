<?php

namespace Controllers;

require_once __DIR__ . '/../utils/Database.php';
require_once __DIR__ . '/../repositories/GameRepository.php';

use Repositories\GameRepository;
use Utils\Database;

class GameController {
    public function index(): void {
        $pdo = Database::getInstance()->getPDO();
        $gameRepository = new GameRepository($pdo);

        $games = $gameRepository->getAllGames();

        var_dump($games);

        require_once __DIR__ . "/../views/games/index.php";
    }
}