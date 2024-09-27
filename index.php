<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Controllers\HomeController;
use Controllers\GameController;

$url = $_SERVER['REQUEST_URI'];

echo($url);

if ($url == '/GameRating/' || $url == '/GameRating/index.php') {
    require_once 'controllers/HomeController.php';
    $controller = new HomeController();
    $controller->index();
} elseif ($url == '/GameRating/games.php') {
    require_once  'controllers/GameController.php';
    $controller = new GameController();
    $controller->index();
} else {
    http_response_code(404);
    echo "Page not found";
}