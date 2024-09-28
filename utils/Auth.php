<?php

namespace Utils;

class Auth {
    public static function checkAuth(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /GameRating/index.php');
            exit();

            //TODO: à améliorer => au moins faire afficher un message comme quoi il faut être authentifié pour accéder à la page, au mieux une redirection vers la page d'origine!
        }
    }
}