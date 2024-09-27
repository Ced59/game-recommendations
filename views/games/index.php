<?php
echo "Page jeu fonctionnelle";
?>

<h1>Page jeux fonctionnelle</h1>

<?php foreach ($games as $game): ?>
    <h3><?= $game['title'] ?></h3>
    <p>Développeur: <?= $game['developer']?></p>
    <p>Genre: <?= $game['genre']?></p>
    <p>Description: <?= $game['description']?></p>
    <p>Année de sortie: <?= $game['release_year']?></p>
<?php endforeach; ?>