<?php

namespace model;

use PDO;

class UtilisateurModel extends Model


{

    public function add($user)
    {
        var_dump($user);
        foreach ($user as $key => &$value) {
            $value = trim(htmlspecialchars($value));
        }
        $SQL = "INSERT INTO utilisateurs (login_u, nom_u, prenom_u, date_naissance_u, adresse_u, mail_u, telephone_u, motdepass_u ) 
        VALUES (:login_u, :nom_u, :prenom_u, :date_naissance_u, :adresse_u, :mail_u, :telephone_u, :motdepass_u)";
        $sth = $this->db->prepare($SQL);
        $sth->bindParam(":login_u", $user->login_u, PDO::PARAM_STR, 255);
        $sth->bindParam(":nom_u", $user->nom_u, PDO::PARAM_STR, 255);
        $sth->bindParam(":prenom_u", $user->prenom_u, PDO::PARAM_STR, 255);
        $sth->bindParam(":adresse_u", $user->adresse_u, PDO::PARAM_STR, 255);
        $sth->bindParam(":mail_u", $user->mail_u, PDO::PARAM_STR, 255);
        $sth->bindParam(":telephone_u", $user->telephone_u, PDO::PARAM_STR, 255);
        $sth->bindParam(":motdepass_u", $user->motdepass_u, PDO::PARAM_STR, 255);
        $sth->bindParam(":date_naissance_u", $user->date_naissance_u, PDO::PARAM_STR, 255);
        $sth->execute();
    }

    public function isInDb($user)
    {
        $sth = $this->db->prepare("SELECT id FROM utilisateurs WHERE login = :login");
        $sth->bindParam(":login", $user->login_u, PDO::PARAM_STR, 255);
        $sth->execute();
    }


    public function connexion($donnees_u)
    {
        return false;
    }
}
