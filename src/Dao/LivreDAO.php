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

    public function selectDetails(int $id) : array
    {
        $requete = $this->db->query("SELECT * FROM Livre");
        $livresDB=$requete->fetchAll(\PDO::FETCH_ASSOC);
        // Mapping relationnel vers objet
        $livres = [];
        foreach ($livresDB as $livreDB) {
            if ($livreDB["id_livre"]==$id) {
                $livre = new Livre();  // Constructeur par défaut
                $livre->setId($livreDB["id_livre"]);
                $livre->setTitre($livreDB["titre_livre"]);
                $livre->setAuteur($livreDB["auteur_livre"]);
                $livre->setNbPages($livreDB["nombre_pages_livre"]);
                $livres[]=$livre;

            }
        }
        return $livres;
    }

//    public function selectDetails(int $id) : array
//    {
//        $requete = $this->db->query("SELECT * FROM Livre WHERE 'id_livre'=$id");
//        $livreDB=$requete->fetchAll(\PDO::FETCH_ASSOC);
//        // Mapping relationnel vers objet
//        $livreDetails = [];
//        $livre = new Livre();  // Constructeur par défaut
//        $livre->setId($livreDB[0]["id_livre"]);
//        $livre->setTitre($livreDB[0]["titre_livre"]);
//        $livre->setAuteur($livreDB[0]["auteur_livre"]);
//        $livre->setNbPages($livreDB[0]["nombre_pages_livre"]);
//        $livreDetails[]=$livre;
//
//        return $livreDetails;
//    }
}