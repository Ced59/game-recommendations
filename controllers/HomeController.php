<?php

namespace Controllers;

use Repositories\UserRepository;
use User;

class HomeController {
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function index(): void {

        $users = $this->userRepository->getAllUser();

        require_once __DIR__ . '/../views/home/index.php';
    }

    public function login(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];

            $user = $this->userRepository->findUserByUsername($pseudo);

            $error = "";

            if (empty($user)){
                $error = "Pseudo inexistant";
            } else {
                if ($user->getPassword() != $password){ // Vraiment très simple et à ne jamais faire sur une vraie application of course! Le hashage du password serait un minimum!
                    $error = "Mot de passe incorrect"; // En conditions réélles je mettrais des erreurs génériques (Least Disclosure Principle)
                    $users = $this->userRepository->getAllUser();
                    require_once __DIR__ . '/../views/home/index.php';

                }
                session_start();
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['pseudo'] = $user->getPseudo();
                //TODO Ajouter redirection
                exit();
            }
        } else {
            $error = "";
        }

        $users = $this->userRepository->getAllUser();
        require_once __DIR__ . '/../views/home/index.php';
    }

    public function register(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];

            $newUser = new User($pseudo, $password);

            $result = $this->userRepository->createUser($newUser);

            if ($result){
                $success = "Création de l'utilisateur réussie. Veuillez vous authentifier";
                $users = $this->userRepository->getAllUser();
                require_once __DIR__ . '/../views/home/index.php';
            }

            $error = "Problème lors de la création de l'utilisateur. Le pseudo ne doit pas déjà être utilisé";

            $users = $this->userRepository->getAllUser();
            require_once __DIR__ . '/../views/home/index.php';
        }
    }
}