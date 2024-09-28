<h2 class="text-center mt-3 mb-3">Ajouter un jeu</h2>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>
<?php endif; ?>

<?php include __DIR__ . '/../partials/messages.php'; ?>

<form action="/GameRating/add-game.php" method="post" class="col-md-6 offset-md-3">
    <input type="hidden" name="action_name" value="add_game">

    <div class="form-group">
        <label for="title">Titre :</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>

    <div class="form-group">
        <label for="developer">Développeur :</label>
        <input type="text" class="form-control" id="developer" name="developer" required>
    </div>

    <div class="form-group">
        <label for="genre">Genre :</label>
        <input type="text" class="form-control" id="genre" name="genre" required>
    </div>

    <div class="form-group">
        <label for="description">Description :</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>

    <div class="form-group">
        <label for="release_year">Année de sortie :</label>
        <input type="number" class="form-control" id="release_year" name="release_year" min="1960" max="2100" required>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Ajouter le jeu</button>
</form>
