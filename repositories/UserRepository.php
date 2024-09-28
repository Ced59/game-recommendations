<?php

namespace Repositories;

require_once __DIR__.'/../models/users/User.php';

use PDOException;
use User;
use PDO;

class UserRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findUserByUsername($pseudo): ?User {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();

        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($userData)) {
            return new User(
                $userData['pseudo'],
                $userData['password'],
                $userData['id']
            );
        } else {
            return null;
        }
    }

    public function createUser(User $user): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (pseudo, password) VALUES (:pseudo, :password)");
        $pseudo = $user->getPseudo();
        $password = $user->getPassword();
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':password', $password);
        try{
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getAllUser(): array {
        $stmt = $this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();

        $usersData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = [];

        foreach ($usersData as $userData){
            $user = new User(
                $userData['pseudo'],
                $userData['password'],
                $userData['id']
            );
            $users[] = $user;
        }

        return $users;
    }

    public function userExists(int $userId): bool
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM users WHERE id = :userId");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->fetchColumn();

        return $count > 0;
    }
}