<?php

namespace App\Controllers;

use App\Dao\LivreDAO;
use App\Entity\Livre;

class LivreController
{
    private LivreDAO $livreDao; // Dépendance
    // Lister l'ensemble des livres

    public function __construct(LivreDAO $dao)
    {
        $this->livreDao = $dao;
    }


    public function list() {
        // Fait appel au modèle afin de récupérer les données dans la bdd
        $livres = $this->livreDao->selectAll();

        // Fait appel à la vue afin de renvoyer la page
        require __DIR__ . '/../../views/livre/list.php';
    }

    public function details(int $id) {
        $livre = $this->livreDao->selectDetails($id);
        if ($livre) {
            require __DIR__.'/../../views/livre/details.php';
        } else {
            echo "Livre non trouvé";
        }
    }

    public function ajouter() {
        require __DIR__.'/../../views/livre/ajouter.php';
        $this->livreDao->postFilm($ajoutLivre);

    }

}