<?php

namespace Controllers;

class HomeController {
    public function index(): void
    {
        require_once __DIR__ . '/../views/home/index.php'; // TODO Ne comprends pas pour le moment pourquoi le chemin relatif n'est possible qu'avec _DIR_... Sûrement à cause de Wamp? Investigation requise.
    }
}