<h1 class="text-center mt-3 mb-4">Bienvenue sur GameRating !</h1>


<div class="row">
    <div class="col-12">
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="alert alert-info" role="alert">
                <?= $success ?>
            </div>
        <?php endif; ?>
    </div>
</div>


<div class="row">

    <div class="col-md-6">
        <h2>Créer un compte</h2>
        <form action="/GameRating/index.php" method="post">
            <input type="hidden" name="action_name" value="register">
            <div class="form-group">
                <label for="new_pseudo">Nom d'utilisateur :</label>
                <input type="text" class="form-control" id="new_pseudo" name="pseudo" required>
            </div>
            <div class="form-group">
                <label for="new_password">Mot de passe :</label>
                <input type="password" class="form-control" id="new_password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Créer un compte</button>
        </form>
    </div>
    <div class="col-md-6">
        <h2>Se connecter</h2>
        <form action="/GameRating/index.php" method="post">
            <input type="hidden" name="action_name" value="login">
            <div class="form-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" class="form-control" id="username" name="pseudo" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</div>

