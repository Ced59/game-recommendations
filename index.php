<?php

use Controllers\HomeController;
use Controllers\GameController;

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

    $url = $_SERVER['REQUEST_URI'];

    if ($url == '/GameRating/' || $url == '/GameRating/index.php') {
        require_once 'controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
    } elseif ($url == '/GameRating/games.php') {
        require_once 'controllers/GameController.php';
        $controller = new GameController();
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
