<?php

namespace Utils;

class Auth {
    public static function checkAuth(): void
    {
        if (!isset($_SESSION['user_id'])) {

            $_SESSION['error'] = "Vous devez être authentifié pour accéder à la page demandée.";

            header('Location: /GameRating/index.php');
            exit();

            //TODO: à améliorer => avec une redirection vers la page d'origine!
        }
    }
}