<?php

namespace Repositories;

require_once __DIR__.'/../models/users/User.php';

use User;
use PDO;

class UserRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findUserByUsername($username): ?User {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($userData)) {
            return new User(
                $userData['id'],
                $userData['pseudo'],
                $userData['password']
            );
        } else {
            return null;
        }
    }
}