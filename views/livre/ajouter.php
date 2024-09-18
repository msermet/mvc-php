<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre=$_POST["titre"];
    $nbPages=$_POST["nbpages"];
    $auteur=$_POST["auteur"];
    $ajoutLivre=new \App\Entity\Livre();
    $ajoutLivre->setTitre($titre);
    $ajoutLivre->setNbPages($nbPages);
    $ajoutLivre->setAuteur($auteur);
    header("Location: /index.php?route=livre-list");
    exit();
}

?>


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
<h1>Ajouter un livre : </h1>
<form action="" method="get" class="form-example">
    <div class="form-example">
        <label for="titre">Titre : </label>
        <input type="text" name="titre" id="titre" required />
    </div>
    <div class="form-example">
        <label for="nbpages">Nombre de pages : </label>
        <input type="number" name="nbpages" id="nbpages" required />
    </div>
    <div class="form-example">
        <label for="auteur">Auteur : </label>
        <input type="text" name="auteur" id="auteur" required />
    </div>
    <div class="form-example">
        <input type="submit" value="Ajouter" />
    </div>
</form>

<a href="index.php?route=livre-list">Liste des livres</a>
</body>
</html>