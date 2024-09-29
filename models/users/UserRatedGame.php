<?php

class UserRatedGame extends User {
    private ?array $ratedGames = null;

    public function addRatedGame(GameRating $gameRating): void {
        if ($this->ratedGames === null) {
            $this->ratedGames = [];
        }

        $this->ratedGames[] = $gameRating;
    }

    public function addRatedGames(array $gamesRatings): void {
        if ($this->ratedGames === null) {
            $this->ratedGames = [];
        }

        $this->ratedGames = array_merge($this->ratedGames, $gamesRatings);;
    }

    public function getRatedGames(): ?array {
        return $this->ratedGames;
    }

    public function hasRatedGamesLoaded(): bool {
        return $this->ratedGames !== null;
    }
}