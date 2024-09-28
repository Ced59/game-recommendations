<?php

namespace Controllers;

require_once  __DIR__ . '/../utils/Auth.php';

use Repositories\GameRepository;
use Utils\Auth;

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

    public function addGame(): void {

        Auth::checkAuth();
        require_once __DIR__ . "/../views/games/add-game.php";
    }
}