<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/GameRating/">GameRating</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <?php if (isset($_SESSION['pseudo'])): ?>
                    <li class="nav-item">
                        <span class="navbar-text me-3">Vous êtes connecté en tant que <?= htmlspecialchars($_SESSION['pseudo'], ENT_QUOTES, 'UTF-8') ?></span>
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
