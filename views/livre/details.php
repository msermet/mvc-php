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
<h1>Détails du livre : </h1>
<ul>
    <li><?= $livre->getId() ?></li>
    <li><?= $livre->getTitre() ?></li>
    <li><?= $livre->getNbPages() ?></li>
    <li><?= $livre->getAuteur() ?></li>
</ul>
<a href="index.php?route=livre-list">Liste des livres</a>
</body>
</html>