<?php

namespace controller;

use Exception;
use model\UtilisateurModel;

class Controller
{
    public function inscription($donnees_u)
    {

        // Verifier l'unicité du login, mail, téléphone

        // Verifier que l'adresse correct 

        if ($this->checkUserInscriptionData($donnees_u)) {
            $utilisateurModel = new UtilisateurModel($donnees_u);
            // $utilisateurModel->add();
        }
    }

    /**
     * 
     * 
     */
    public function checkUserInscriptionData($donnees_u)
    {
        $errorsmsg = [];

        // foreach data of table, we check if they are not empty
        foreach ($donnees_u as $key => $value) {
            if (empty($value)) {
                $errormsg[] = "Le champ $key doit être renseigné.";
            }
        }
        // check if the mail is valid
        if (!filter_var($donnees_u['mail_u'], FILTER_VALIDATE_EMAIL)) {
            $errormsg[] = "L'adresse email {$donnees_u['mail_u']} est considérée comme invalide.";
        }
        // check if the password are the same 
        if ($donnees_u['motdepass_u'] != $donnees_u['motdepass_u_conf']) {
            $errormsg[] = "Les mots de passe ne correspondent pas.";
        }
        //check if the postal adress is correct
        // <input type="text" name="nom_rue_adresse_u" placeholder="Nom de la rue">
        // <input type="text" name="ville_adresse_u" placeholder="Ville">
        // <input type="text" name="postal_adresse_u" placeholder="Code postal">
        if (((int) $donnees_u['numero_rue_adresse_u']) == 0) {
            $errormsg[] = "Le champ renseigné doit être un chiffre";
        }

        if (strlen($donnees_u['nom_rue_adresse_u']) > 1) {
        }
        var_dump($errormsg);
    }
}
