<?php

class Game {
    private int $id;
    private string $title;
    private string $developer;
    private string $genre;
    private string $description;
    private int $release_year;

    public function __construct($id, $title, $developer, $genre, $description, $release_year) {
        $this->setId($id);
        $this->setTitle($title);
        $this->setDeveloper($developer);
        $this->setGenre($genre);
        $this->setDescription($description);
        $this->setReleaseYear($release_year);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDeveloper(): string
    {
        return $this->developer;
    }

    /**
     * @param string $developer
     */
    public function setDeveloper(string $developer): void
    {
        $this->developer = $developer;
    }

    /**
     * @return string
     */
    public function getGenre(): string
    {
        return $this->genre;
    }

    /**
     * @param string $genre
     */
    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getReleaseYear(): int
    {
        return $this->release_year;
    }

    /**
     * @param int $release_year
     */
    public function setReleaseYear(int $release_year): void
    {
        $this->release_year = $release_year;
    }


}