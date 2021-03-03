<?php

namespace model;

class ComposerModel extends Model
{
    public function getLignesWithProductDetails(int $id_com)
    {
        $SQL = "SELECT Composer.id_p, Composer.qt_article, Produit.nom_p, Produit.prix_ht_p
                FROM {$this->table} 
                INNER JOIN Produit ON Composer.id_p = Produit.id_p
                WHERE id_com = $id_com";
        return $this->fetchAll($SQL);
    }
}
