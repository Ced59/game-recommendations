<h1 class="text-center mt-3 mb-4">Bienvenue sur Game Recommendations !</h1>

<?php if (isset($_SESSION['pseudo'])): ?>
    <p class="text-center">Vous êtes authentifié en tant que <?= htmlspecialchars($_SESSION['pseudo'], ENT_QUOTES, 'UTF-8') ?></p>

    <form class="text-center" action="/GameRating/index.php" method="post">
        <input type="hidden" name="action_name" value="logout">
        <button type="submit" class="btn btn-secondary">Se déconnecter</button>
    </form>
<?php else: ?>

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

    <div class="row mt-5">
        <div class="col-12">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                <tr>
                    <th colspan="3" class="text-center">Liste des utilisateurs</th>
                </tr>
                <tr>
                    <th class="col-4">Pseudo</th>
                    <th class="col-4">Password</th>
                    <th class="col-4">Login direct</th>
                </tr>
                </thead>
                <tbody>
                <?php /* @var $users User[] */
                foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user->getPseudo(), ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($user->getPassword(), ENT_QUOTES, 'UTF-8') ?></td>
                        <td>
                            <form action="/GameRating/index.php" method="post">
                                <input type="hidden" name="action_name" value="login">
                                <input type="hidden" name="pseudo" value="<?= $user->getPseudo() ?>">
                                <input type="hidden" name="password" value="<?= $user->getPassword() ?>">
                                <button type="submit" class="btn btn-success">S'authentifier avec cet utilisateur</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php endif; ?>