<?php

class GameRating extends Game {
    private ?int $rating;

    public function __construct(int $id, string $title, string $developer, string $genre, string $description, int $release_year, ?int $rating) {
        parent::__construct($id, $title, $developer, $genre, $description, $release_year);
        $this->setRating($rating);
    }

    public function getRating(): ?int {
        return $this->rating;
    }

    public function setRating(?int $rating): void
    {
        $this->rating = $rating;
    }
}