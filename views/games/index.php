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