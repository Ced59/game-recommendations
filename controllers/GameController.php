<?php

namespace Controllers;

require_once  __DIR__ . '/../utils/Auth.php';
require_once  __DIR__ . '/../models/games/Game.php';
require_once  __DIR__ . '/../models/games/GameRating.php';
require_once  __DIR__ . '/../models/users/UserRatedGame.php';

use Game;
use GameRating;
use Repositories\GameRepository;
use Repositories\UserRepository;
use UserRatedGame;
use Utils\Auth;

class GameController {
    private GameRepository $gameRepository;
    private UserRepository $userRepository;

    public function __construct(GameRepository $gameRepository, UserRepository $userRepository)
    {
        $this->gameRepository = $gameRepository;
        $this->userRepository = $userRepository;
    }

    public function index(): void {

        $games = $this->gameRepository->getAllGamesWithAverageRatings();
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

                if ($release_year < 1960 || $release_year > 2100) {
                    $error = "L'année de sortie doit être comprise entre 1960 et 2100.";
                } else {
                    $newGame = new Game(null, $title, $developer, $genre, $description, $release_year);

                    $success = $this->gameRepository->createGame($newGame);

                    if ($success) {
                        $success = "Le jeu a été ajouté avec succès !";
                    } else {
                        $error = "Une erreur est survenue lors de l'ajout du jeu."; //TODO discriminer le type d'erreur (si titre en doublon ou autre) => ce qui peut se faire via la captation d'exception ou via des conditions dans le Repository!
                    }
                }
            }
        }

        // Passer les variables à la vue
        require_once __DIR__ . "/../views/games/add-game.php";
    }

    public function viewGameDetail(): void
    {

        // TODO methode à revoir! Faut trouver un moyen de la réécrire et de gérer les cas de facon plus propre! Plus gros problème => récupération en double du jeu!

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['idGame'])) {
            $gameId = filter_input(INPUT_GET, 'idGame', FILTER_VALIDATE_INT);

            if ($gameId) {
                $game = $this->gameRepository->findGameById((int)$gameId);

                if ($game != null) {

                    $gameRated = new GameRating(
                        $game->getId(),
                        $game->getTitle(),
                        $game->getDeveloper(),
                        $game->getGenre(),
                        $game->getDescription(),
                        $game->getReleaseYear(),
                        null
                    );


                    if (isset($_SESSION['user_id'])) {
                        $userId = $_SESSION['user_id'];
                        $gameWithRating = $this->gameRepository->getRatedGameByUserIdAndGameId($userId, $gameId);

                        if (isset($gameWithRating)){
                            $gameRated = $gameWithRating; // Définitivement il y a beaucoup mieux à faire dans cette méthode!!!
                        }

                    }
                    require_once __DIR__ . '/../views/games/detail-game.php';
                } else {
                    $error = "Jeu non trouvé";
                    require_once __DIR__ . '/../views/home/index.php';
                }
            } else {
                $error = "Error (invalid id?)";
                require_once __DIR__ . '/../views/home/index.php';
            }
        }
    }

    public function ratingGame(): void
    {
        Auth::checkAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action_name'] === 'rating') {

            $userId = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
            $gameId = filter_input(INPUT_POST, 'idGame', FILTER_VALIDATE_INT);
            $ratingValue = filter_input(INPUT_POST, 'rating_value', FILTER_VALIDATE_INT);

            if (!$userId || !$gameId || !$ratingValue || $ratingValue < 1 || $ratingValue > 10) {
                $error = "Erreur : données invalides ou note hors de la plage autorisée (1-10).";
                require_once __DIR__ . '/../views/home/index.php';
                return;
            }

            if (!$this->userRepository->userExists($userId) || !$this->gameRepository->gameExists($gameId)) {
                $error = "Erreur : l'utilisateur ou le jeu spécifié n'existe pas.";
                require_once __DIR__ . '/../views/home/index.php';
                return;
            }

            $result = $this->gameRepository->saveRating($userId, $gameId, $ratingValue);

            if ($result) {
                $_SESSION['success'] = "Enregistrement de la note réussi";
            } else {
                $_SESSION['error'] = "Une erreur est survenue lors de l'enregistrement de la note.";
            }

            header("Location: /GameRating/games.php?idGame=$gameId");
            exit;

        } else {
            header("Location: /GameRating/index.php");
            exit;
        }
    }

    public function viewRatings(): void
    {
        Auth::checkAuth();

        $userId = filter_var($_SESSION['user_id'], FILTER_VALIDATE_INT);

        if ($userId === false) {
            $error = "Erreur : ID utilisateur invalide dans la session.";
            require_once __DIR__ . '/../views/home/index.php';
        }

        $user = $this->userRepository->findUserById($userId);

        $userRatedGame = new UserRatedGame(
            $user->getPseudo(),
            $user->getPassword(), // genre de données à ne pas récupérer et encore moins à afficher...
            $user->getId()
        );

        $userRatedGame->addRatedGames($this->gameRepository->getRatedGamesByUserId($userId));

        require_once __DIR__ . '/../views/games/view-ratings.php';
    }
}