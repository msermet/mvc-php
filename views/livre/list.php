<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste livres</title>
</head>
<body>
    <h1>Liste des livres</h1>
    <ul>
    <?php foreach ($livres as $livre): ?>
        <li><?= $livre->getTitre() ?><a href="index.php?route=details-livre&idlivre=<?= $livre->getId() ?>"> Détails</a></li>
    <?php endforeach; ?>
        <li><a href="index.php?route=ajouter-livre"> Ajouter un livre</a></li>
    </ul>
    <a href="index.php">Accueil</a>
</body>
</html>