<?php

namespace Controllers;

class GameController {
    public function index(): void {
        require_once __DIR__ . "/../views/games/index.php";
    }
}