<h2 class="text-center mt-3 mb-3">Liste des jeux</h2>

<div class="row">
    <?php
    /* @var $games Game[] */
    foreach ($games as $game):
        ?>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
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
    <?php endforeach; ?>
</div>