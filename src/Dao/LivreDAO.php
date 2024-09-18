<?php

namespace App\Dao;

use App\Entity\Livre;

class LivreDAO
{
    private \PDO $db;

    /**
     * @param \PDO $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    // Envoyer la requête "SELECT * FROM Livre"
    // Retourner les enregistrements sous la forme d'un tableau d'objets de la classe Livre

    public function selectAll() : array
    {
        $requete = $this->db->query("SELECT * FROM Livre");
        $livresDB=$requete->fetchAll(\PDO::FETCH_ASSOC);
        // Mapping relationnel vers objet
        $livres = [];
        foreach ($livresDB as $livreDB) {
            $livre = new Livre();  // Constructeur par défaut
            $livre->setId($livreDB["id_livre"]);
            $livre->setTitre($livreDB["titre_livre"]);
            $livre->setAuteur($livreDB["auteur_livre"]);
            $livre->setNbPages($livreDB["nombre_pages_livre"]);
            $livres[]=$livre;
        }
        return $livres;
    }

    public function selectDetails(int $id) : ?Livre
    {
        $stmt = $this->db->query("SELECT * FROM Livre WHERE id_livre = $id");
        $livreDB = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$livreDB) {
            return null;
        }
        $livre = new Livre();  // Constructeur par défaut
        $livre->setId($livreDB["id_livre"]);
        $livre->setTitre($livreDB["titre_livre"]);
        $livre->setAuteur($livreDB["auteur_livre"]);
        $livre->setNbPages($livreDB["nombre_pages_livre"]);
        return $livre;
    }

    public function postFilm($livreAjouter): void
    {
        $titre=$livreAjouter->getTitre();
        $nbPages=$livreAjouter->getNbPages();
        $auteur=$livreAjouter->getAuteur();
        $requete = $this->db->prepare('INSERT INTO livre (titre_livre,nombre_pages_livre,auteur_livre) VALUES (?,?,?)');
        $requete->bindParam(1,$titre);
        $requete->bindParam(2, $nbPages);
        $requete->bindParam(3, $auteur);
        $requete->execute();
    }


}