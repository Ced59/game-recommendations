<?php

namespace Controllers;

use Repositories\UserRepository;

class HomeController {
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function index(): void {
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
                if ($user->getPassword() != $password){
                    $error = "Mot de passe incorrect";
                }
                var_dump($user);
            }
        } else {
            $error = "";
        }

        require_once __DIR__ . '/../views/home/index.php';
    }
}