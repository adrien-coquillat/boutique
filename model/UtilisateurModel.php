<?php

namespace model;

use entity\UtilisateurEntity;
use PDO;

class UtilisateurModel extends Model

{

    public function add($user)
    {
        foreach ($user as $key => &$value) {
            $value = trim(htmlspecialchars($value));
        }
        $SQL = "INSERT INTO utilisateur (login_u, nom_u, prenom_u, datedenaissance_u, adresse_u, mail_u, telephone_u, motdepass_u ) 
        VALUES (:login_u, :nom_u, :prenom_u, :datedenaissance_u, :adresse_u, :mail_u, :telephone_u, :motdepass_u)";
        $sth = $this->db->prepare($SQL);
        $sth->bindParam(":login_u", $user->login_u, PDO::PARAM_STR, 255);
        $sth->bindParam(":nom_u", $user->nom_u, PDO::PARAM_STR, 255);
        $sth->bindParam(":prenom_u", $user->prenom_u, PDO::PARAM_STR, 255);
        $sth->bindParam(":adresse_u", $user->adresse_u);
        $sth->bindParam(":mail_u", $user->mail_u);
        $sth->bindParam(":telephone_u", $user->telephone_u);
        $sth->bindParam(":motdepass_u", $user->motdepass_u, PDO::PARAM_STR, 255);
        $sth->bindParam(":datedenaissance_u", $user->datedenaissance_u, PDO::PARAM_STR, 255);
        $sth->execute();
    }

    public function isInDb($user)
    {
        $sth = $this->db->prepare("SELECT * FROM utilisateur WHERE login_u = :login_u");
        $sth->bindParam(":login_u", $user['login_u']);
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }
    public function editProfil($user)
    {
        extract($user);
        var_dump($user);

        $sql = "UPDATE `utilisateur` 
                SET `adresse_u`= :adresse_u, `mail_u`= :mail_u, `nom_u`= :nom_u, `prenom_u`= :prenom_u, `telephone_u`= :telephone_u, `login_u`= :login_u, `motdepass_u`= :motdepass_u, `datedenaissance_u`= :datedenaissance_u 
                WHERE id_u = :id_u";
        $sth = $this->db->prepare($sql);
        $sth->execute([
            ":adresse_u" => $adresse_u,
            ":mail_u"    => $mail_u,
            ":nom_u"     => $nom_u,
            ":prenom_u"  => $prenom_u,
            ":telephone_u" => $telephone_u,
            ":login_u"     => $login_u,
            ":motdepass_u" => $motdepass_u,
            ":datedenaissance_u" => $datedenaissance_u,
            ":id_u" => $id_u


        ]);
    }
}
