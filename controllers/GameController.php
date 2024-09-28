<?php

namespace Controllers;

use Repositories\GameRepository;

class GameController {
    private GameRepository $gameRepository;
    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    public function index(): void {

        $games = $this->gameRepository->getAllGames();
        $gamesCount = $this->gameRepository->getCountGames();

        require_once __DIR__ . "/../views/games/index.php";
    }
}