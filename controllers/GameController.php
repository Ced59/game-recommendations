<?php

namespace Controllers;

require_once  __DIR__ . '/../utils/Auth.php';
require_once  __DIR__ . '/../models/games/Game.php';

use Game;
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
        $title = "";
        $developer = "";
        $genre = "";
        $description = "";
        $release_year = "";
        $error = "";
        $success = "";


        Auth::checkAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action_name'] === 'add_game') {
            $title = filter_input(INPUT_POST, 'title', FILTER_UNSAFE_RAW);
            $developer = filter_input(INPUT_POST, 'developer', FILTER_UNSAFE_RAW);
            $genre = filter_input(INPUT_POST, 'genre', FILTER_UNSAFE_RAW);
            $description = filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW);
            $release_year = filter_input(INPUT_POST, 'release_year', FILTER_VALIDATE_INT);

            if (!$title || !$developer || !$genre || !$release_year) {
                $error = "Veuillez remplir tous les champs obligatoires.";
            } else {
                $newGame = new Game(null, $title, $developer, $genre, $description, $release_year);

                $success = $this->gameRepository->createGame($newGame);

                if ($success) {
                    $success = "Le jeu a été ajouté avec succès !";
                } else {
                    $error = "Une erreur est survenue lors de l'ajout du jeu.";
                }
            }
        } else {
            $error = "";
            $success = "";
        }

        // Passer les variables à la vue
        require_once __DIR__ . "/../views/games/add-game.php";
    }
}