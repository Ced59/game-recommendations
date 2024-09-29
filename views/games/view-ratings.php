<?php
/* @var $userRatedGame UserRatedGame */
/* @var $game GameRating */
?>

    <h2 class="text-center mt-3 mb-3">Liste des jeux noté de <?= $userRatedGame->getPseudo() ?></h2>

<?php if (count($userRatedGame->getRatedGames()) > 0): ?>
    <div class="row">
        <?php
        foreach ($userRatedGame->getRatedGames() as $game):
            ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <a href="/GameRating/games.php?idGame=<?= $game->getId() ?>" class="card text-decoration-none">
                    <div class="card-body">
                        <h5 class="card-title"><?= $game->getTitle() ?></h5>
                        <p class="card-text">Développeur: <?= $game->getDeveloper() ?></p>
                        <p class="card-text">Genre: <?= $game->getGenre() ?></p>
                        <p class="card-text">Description: <?= $game->getDescription() ?></p>
                        <p class="card-text">Année de sortie: <?= $game->getReleaseYear() ?></p>
                        <p class="card-text">Ta note: <?= $game->getRating() ?></p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

<?php else: ?>
    <div class="text-center">
        <p>Tu n'as pas encore noté de jeu</p>
        <a href="/GameRating/games.php" class="btn btn-primary ms-2">Voir tous les jeux</a>
    </div>
<?php endif; ?>