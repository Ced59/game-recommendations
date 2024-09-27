<?php

class User {
    private int $id;
    private string $pseudo;
    private string $password;


    public function __construct(int $id, string $pseudo, string $password) {
        $this->setId($id);
        $this->setPseudo($pseudo);
        $this->setPassword($password);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }


}