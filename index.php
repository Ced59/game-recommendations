<?php

$url = $_SERVER['REQUEST_URI'];

echo($url);

if ($url == '/GameRating/' || $url == '/GameRating/index.php') {
    require_once 'controllers/HomeController.php';
    $controller = new Controllers\HomeController();
    $controller->index();
} else {
    http_response_code(404);
    echo "Page not found";
}