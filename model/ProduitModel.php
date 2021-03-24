<?php

namespace model;

use entity\Entity;
use PDO;

class ProduitModel extends Model
{
    public function ByCategorie($id_c)
    {
        $SQL = 'SELECT * from Produit 
                INNER JOIN Sous_categorie 
                ON Produit.id_sc = Sous_categorie.id_sc 
                WHERE Sous_categorie.id_c = ' . $id_c;
        return $this->fetchAll($SQL);
    }

    public function BySous_categorie($id_sc)
    {
        $SQL = 'SELECT * from Produit 
                WHERE id_sc = ' . $id_sc;
        return $this->fetchAll($SQL);
    }

    public function searchKeyWord(string $keyword)
    {
        $keyword = htmlspecialchars($keyword);
        $sth = $this->db->prepare("SELECT * FROM Produit WHERE LOCATE(:keyword, `description_p`) OR LOCATE(:keyword, `nom_p`)");
        $sth->bindParam(":keyword", $keyword);
        $sth->execute();
        $sth->setFetchMode(PDO::FETCH_CLASS, Entity::class);
        return  $sth->fetchAll();
    }
}
