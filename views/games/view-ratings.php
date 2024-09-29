<?php
/* @var $userRatedGame UserRatedGame */
?>

<h2 class="text-center mt-3 mb-3">Liste des jeux noté de <?= $userRatedGame->getPseudo() ?></h2>


<!--<div class="row">-->
<!--    --><?php
//    foreach ($games as $game):
//        ?>
<!--        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">-->
<!--            <a href="/GameRating/games.php?idGame=--><?php //= $game->getId() ?><!--" class="card text-decoration-none">-->
<!--                <div class="card-body">-->
<!--                    <h5 class="card-title">--><?php //= $game->getTitle() ?><!--</h5>-->
<!--                    <p class="card-text">Développeur: --><?php //= $game->getDeveloper() ?><!--</p>-->
<!--                    <p class="card-text">Genre: --><?php //= $game->getGenre() ?><!--</p>-->
<!--                    <p class="card-text">Description: --><?php //= $game->getDescription() ?><!--</p>-->
<!--                    <p class="card-text">Année de sortie: --><?php //= $game->getReleaseYear() ?><!--</p>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
<!--    --><?php //endforeach; ?>
<!--</div>-->