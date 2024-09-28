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

<?php if (isset($_SESSION['user_id'])): ?>
    <div class="row justify-content-center">
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Noter ce jeu</h5>
                    <form action="/GameRating/games.php" method="post">
                        <input type="hidden" name="idGame" value="<?= $game->getId() ?>">
                        <div class="mb-3 text-center">
                            <label for="rating" class="form-label">Note (1 à 10)</label>
                            <select class="form-select" id="rating" name="rating">
                                <?php for ($i = 1; $i <= 10; $i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-primary">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>