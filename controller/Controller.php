<?php

namespace controller;

use entity\UtilisateurEntity;
use Exception;
use model\UtilisateurModel;

class Controller
{
    public function inscription($donnees_u)
    {
        // if form is empty, stop fonction execution
        if (empty($donnees_u)) {
            return;
        }
        $user = new UtilisateurEntity($donnees_u);

        if (($msg = $user->checkData()) === TRUE) {
            //$utilisateurModel = new UtilisateurModel($donnees_u);
            // $utilisateurModel->add();
        } else {
            throw new Exception(implode('<br />', $msg));
        }
    }

    public function backoffice()
    {
        $access = TRUE;
        if (!$access) {
            header('Location: index.php?page=home&error=accessdenied');
        }

        //new UtilisateurModel
    }
}
