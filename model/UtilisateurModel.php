<?php

namespace model;

use PDO;

class UtilisateurModel extends Model

{

    public function add($user, $table = NULL)
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

    public function getLogin($id)
    {
        $sth = $this->db->prepare("SELECT login_u FROM utilisateur WHERE id_u = :id_u");
        $sth->bindParam(":id_u", $id);
        $sth->execute();
        $result = $sth->fetch();
        return $result["id_u"];
    }

    public function editProfil($user)
    {
        extract($user);

        $sql = "UPDATE `utilisateur` 
                SET `adresse_u`= :adresse_u, `mail_u`= :mail_u, `nom_u`= :nom_u, `prenom_u`= :prenom_u, `telephone_u`= :telephone_u, `motdepass_u`= :motdepass_u, `datedenaissance_u`= :datedenaissance_u 
                WHERE id_u = :id_u";
        $sth = $this->db->prepare($sql);
        $sth->execute([
            ":adresse_u" => $adresse_u,
            ":mail_u"    => $mail_u,
            ":nom_u"     => $nom_u,
            ":prenom_u"  => $prenom_u,
            ":telephone_u" => $telephone_u,
            ":motdepass_u" => $motdepass_u,
            ":datedenaissance_u" => $datedenaissance_u,
            ":id_u" => $id_u
        ]);
    }

    public function getId()
    {
        if (!isset($_SESSION['user'])) {
            $temp_user = [
                'login_u' => session_id(),
                'nom_u' => 'temp',
                'prenom_u' => 'temp',
                'datedenaissance_u' => '2000-01-01',
                'adresse_u' => ' ',
                'mail_u' => ' ',
                'telephone_u' => 0,
                'motdepass_u' => ' '
            ];
            if (!($user_data = $this->isInDb($temp_user))) {
                parent::add($temp_user);
                $user_data = $this->isInDb($temp_user);
            }
            $_SESSION['user'] = $user_data;
        }
        return (int) $_SESSION['user']['id_u'];
    }
}
