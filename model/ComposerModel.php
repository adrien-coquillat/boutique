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

    public function isOwnerComposer(int $id_u, int $id_comp)
    {
        $SQL = "SELECT Commande.id_u 
                FROM {$this->table} 
                INNER JOIN Commande ON Composer.id_com = Commande.id_com
                WHERE Composer.id_comp = $id_comp AND Commande.prix_ttc_com = 0";
        $result = $this->fetch($SQL);
        if (!is_object($result) || !((int) $result->id_u == $id_u)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
