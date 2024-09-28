<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/GameRating/">GameRating</a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['pseudo'])): ?>
                    <li class="nav-item">
                        <span class="navbar-text">Vous êtes connecté en tant que <?= htmlspecialchars($_SESSION['pseudo'], ENT_QUOTES, 'UTF-8') ?></span>
                    </li>
                    <li class="nav-item">
                        <form action="/GameRating/index.php" method="post" class="d-inline">
                            <input type="hidden" name="action_name" value="logout">
                            <button type="submit" class="btn btn-link nav-link">Se déconnecter</button>
                        </form>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <span class="navbar-text">Authentifiez-vous pour plus de fonctionnalités</span>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
