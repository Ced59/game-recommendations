<?php
/* @var $gameRated GameRating */
?>

<h2 class="text-center mt-4 mb-3">Détails du jeu <?= $gameRated->getTitle() ?></h2>

<div class="row justify-content-center">
    <div class="col-md-6 mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $gameRated->getTitle() ?></h5>
                <p class="card-text">Développeur: <?= $gameRated->getDeveloper() ?></p>
                <p class="card-text">Genre: <?= $gameRated->getGenre() ?></p>
                <p class="card-text">Description: <?= $gameRated->getDescription() ?></p>
                <p class="card-text">Année de sortie: <?= $gameRated->getReleaseYear() ?></p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <?php include __DIR__ . '/../partials/messages.php'; ?>
    </div>
</div>

<?php if (isset($_SESSION['user_id'])): ?>
    <div class="row justify-content-center">
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-body">
                    <?php if (isset($gameRated) && $gameRated->getRating() == null): ?>
                        <h5 class="card-title text-center">Noter ce jeu</h5>
                        <form action="/GameRating/games.php" method="post">
                            <input type="hidden" name="action_name" value="rating">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                            <input type="hidden" name="idGame" value="<?= $gameRated->getId() ?>">
                            <div class="mb-3 text-center">
                                <label for="rating" class="form-label">Note (1 à 10)</label>
                                <select class="form-select" id="rating_value" name="rating_value">
                                    <?php for ($i = 1; $i <= 10; $i++): ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-primary">Soumettre</button>
                            </div>
                        </form>

                    <?php else: ?>
                        <h5 class="card-title text-center">Tu as déjà noté ce jeu!</h5>
                        <p class="card-text">Ta note: <?= $gameRated->getRating() ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
