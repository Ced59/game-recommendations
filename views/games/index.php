<h2 class="text-center mt-3 mb-3">Liste des jeux</h2>

<?php
/* @var $gamesCount int */
?>
<h5 class="text-center mb-4">Il y a <?= $gamesCount ?> jeu(x) au total dans la base.</h5>


<div class="row">
    <?php
    /* @var $games GameWithAverageRating[] */
    foreach ($games as $game):
        ?>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <a href="/GameRating/games.php?idGame=<?= $game->getId() ?>" class="card text-decoration-none">
                <div class="card-body">
                    <h5 class="card-title"><?= $game->getTitle() ?></h5>
                    <p class="card-text">Développeur: <?= $game->getDeveloper() ?></p>
                    <p class="card-text">Genre: <?= $game->getGenre() ?></p>
                    <p class="card-text">Description: <?= $game->getDescription() ?></p>
                    <p class="card-text">Année de sortie: <?= $game->getReleaseYear() ?></p>
                    <?php if ($game->getAverageRating() == null): ?>
                        <p class="card-text">Note moyenne: non disponible</p>
                    <?php else: ?>
                        <p class="card-text">Note moyenne: <?= number_format($game->getAverageRating(), 2) ?></p>
                    <?php endif; ?>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>