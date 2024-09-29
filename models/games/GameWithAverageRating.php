<?php

class GameWithAverageRating extends Game {
    private ?float $averageRating;

    public function __construct(int $id, string $title, string $developer, string $genre, string $description, int $release_year, ?float $averageRating) {
        parent::__construct($id, $title, $developer, $genre, $description, $release_year);
        $this->setAverageRating($averageRating);
    }

    public function getAverageRating(): ?float {
        return $this->averageRating;
    }

    public function setAverageRating(?float $averageRating): void
    {
        $this->averageRating = $averageRating;
    }

}
