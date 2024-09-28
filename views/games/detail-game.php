<?php
/* @var $game Game */
?>

<h2 class="text-center mt-4 mb-3">Détails du jeu <?= $game->getTitle() ?></h2>

<div class="row justify-content-center">
    <div class="col-md-6 mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $game->getTitle() ?></h5>
                <p class="card-text">Développeur: <?= $game->getDeveloper() ?></p>
                <p class="card-text">Genre: <?= $game->getGenre() ?></p>
                <p class="card-text">Description: <?= $game->getDescription() ?></p>
                <p class="card-text">Année de sortie: <?= $game->getReleaseYear() ?></p>
            </div>
        </div>
    </div>
</div>