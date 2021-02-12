<?php

namespace entity;

use Exception;

class UtilisateurEntity
{

    /** 
     * Check if user data are correct 
     */
    public function checkUserInscriptionData($donnees_u)
    {
        $errormsg = [];

        // foreach data of table, we check if they are not empty
        foreach ($donnees_u as $key => $value) {
            if (empty($value)) {
                $nomduchamp = str_replace('_', ' ', str_replace('_u', '', $key));
                $errormsg[] = "Le champ $nomduchamp doit être renseigné.";
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
        // check telephone number and number of charactere
        if (strlen($donnees_u['telephone_u']) != 10 ||  (((int) $donnees_u['telephone_u']) == 0)) {
            $errormsg[] = "Le numéro de téléphone doit contenir 10 chiffres.";
        }
        //check if the postal adress is correct
        if (((int) $donnees_u['numero_rue_adresse_u']) == 0) {
            $errormsg[] = "Le champ numéro renseigné doit être un chiffre.";
        }

        if (strlen($donnees_u['nom_rue_adresse_u']) < 2) {
            $errormsg[] = "Le nom de la rue doit contenir minimum 2 caractères.";
        }
        if (strlen($donnees_u['ville_adresse_u']) < 2) {
            $errormsg[] = "Le nom de la ville doit contenir minimum 2 caractères.";
        }
        if ((((int) $donnees_u['postal_adresse_u']) == 0) || (strlen($donnees_u['postal_adresse_u']) != 5)) {
            $errormsg[] = "Le champ renseigné doit être un nombre de 5 entiers.";
        }

        // check if there are an error on the POST
        if (empty($errormsg)) {
            return true;
        } else {
            $errormsgstring = implode("<br />", $errormsg);
            throw new Exception($errormsgstring);
            return false;
        }
    }
}
