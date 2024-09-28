<?php

require_once __DIR__ . '/utils/Database.php';
require_once __DIR__ . '/repositories/GameRepository.php';
require_once __DIR__ . '/repositories/UserRepository.php';

use Controllers\HomeController;
use Controllers\GameController;
use Repositories\GameRepository;
use Repositories\UserRepository;
use Utils\Database;

// Déclaration des services pour injection de dépendances
$pdo = Database::getInstance()->getPDO();
$gameRepository = new GameRepository($pdo);
$userRepository = new UserRepository($pdo);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameRating</title>
    <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container">

    <?php
    // récupération de l'URI actuelle
    $url = $_SERVER['REQUEST_URI'];

    // implémentation du routing
    if ($url == '/GameRating/' || $url == '/GameRating/index.php') {
        require_once 'controllers/HomeController.php';
        $controller = new HomeController($userRepository);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action_name'] === 'login') {
            $controller->login();
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action_name'] === 'register') {
            $controller->register();
        } else {
            $controller->index();
        }
    } elseif ($url == '/GameRating/games.php') {
        require_once 'controllers/GameController.php';
        $controller = new GameController($gameRepository);
        $controller->index();
    } else {
        http_response_code(404);
        echo "Page not found";
    }
    ?>

</div>

<script src="public/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
