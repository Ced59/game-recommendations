<h1>Bienvenue sur GameRating !</h1>

<form action="/GameRating/index.php" method="post">
    <div class="form-group">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" required>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>
<?php endif; ?>
