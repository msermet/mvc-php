<?php

namespace App\Controllers;

use App\Dao\LivreDAO;

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
    public function details() {
        $id = null;
        if (isset($_GET["idlivre"])) {
            $id = filter_var($_GET["idlivre"], FILTER_VALIDATE_INT);
        }
        if ($id) {
            if ($this->livreDao->selectDetails($id)) {
                $livres = $this->livreDao->selectDetails($id);
                // Fait appel à la vue afin de renvoyer la page
                require __DIR__ . '/../../views/livre/details.php';
            }
        }
    }

}