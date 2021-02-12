<?php

namespace controller;

use entity\UtilisateurEntity;

class Controller
{
    public function inscription($donnees_u)
    {
        // if form is empty, stop fonction execution
        if (empty($donnees_u)) {
            return;
        }

        $user = new UtilisateurEntity();

        if ($user->checkUserInscriptionData($donnees_u)) {
            //$utilisateurModel = new UtilisateurModel($donnees_u);
            // $utilisateurModel->add();
        }
    }
}
