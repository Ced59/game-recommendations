<h1 class="text-center mt-3 mb-4">Bienvenue sur Game Recommendations !</h1>

<?php if (isset($_SESSION['pseudo'])): ?>

    <div class="row">
        <div class="col-12">
            <?php include __DIR__ . '/../partials/messages.php'; ?>
        </div>
    </div>

    <p class="text-center">Vous êtes authentifié en tant
        que <?= htmlspecialchars($_SESSION['pseudo'], ENT_QUOTES, 'UTF-8') ?></p>
    <p class="text-center mt-2 mb-3">Pour noter un jeu, allez sur la page "Voir tous les jeux" et cliquez sur celui que
        vous voulez noter.</p>

    <div class="text-center mt-3 mb-3">
        <a href="/GameRating/add-game.php" class="btn btn-primary">Ajouter un jeu</a>
        <a href="/GameRating/games.php" class="btn btn-primary ms-2">Voir tous les jeux</a>
        <a href="/GameRating/my-ratings.php" class="btn btn-primary ms-2">Voir mes notes</a>
    </div>


    <?php /* @var $recommendedGames GameWithAverageRating[] */ ?>
    <?php if (isset($recommendedGames) && count($recommendedGames) > 0): ?>
        <div class="row">
            <div class="text-center mt-4 mb-4">
                <p>Tes recommandations:</p>
            </div>
            <?php
            foreach ($recommendedGames as $game):
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
    <?php else: ?>
        <div class="row mt-5 mb-5">
            <div class="text-center">
                <p>Tu n'as pas encore de jeu recommandé.</p>
                <p>Note des jeux pour qu'ils apparaissent.</p>
                <a href="/GameRating/games.php" class="btn btn-primary ms-2">Voir tous les jeux</a>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-5">
        <form class="text-center" action="/GameRating/index.php" method="post">
            <input type="hidden" name="action_name" value="logout">
            <button type="submit" class="btn btn-secondary">Se déconnecter</button>
        </form>
    </div>

<?php else: ?>

    <div class="row">
        <div class="col-12">
            <?php include __DIR__ . '/../partials/messages.php'; ?>
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
        <div class="text-center mt-3 mb-3">
            <p class="text-center mt-2 mb-3">Vous ne voulez pas vous authentifier? Vous pouvez voir la liste des jeux
                ci-dessous.</p>
            <a href="/GameRating/games.php" class="btn btn-primary ms-2">Voir tous les jeux</a>
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
                                <button type="submit" class="btn btn-success">S'authentifier avec cet utilisateur
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php endif; ?>