<?php

namespace controller;

use Exception;
use model\UtilisateurModel;

class Controller
{
    public function inscription($donnees_u)
    {

        // Verifier l'unicité du login, mail, téléphone
        // Verifier que tous les champs sont renseignés
        // Verifier que l'email correct
        // Verifier que l'adresse correct 
        // Verifier que les mots de pass sont identiques
        if ($this->checkUserInscriptionData($donnees_u)) {
            $utilisateurModel = new UtilisateurModel($donnees_u);
            $utilisateurModel->add();
        }
    }
}
