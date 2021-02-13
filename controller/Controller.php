<?php

namespace controller;

use entity\UtilisateurEntity;
use Exception;

class Controller
{
    public function inscription($donnees_u)
    {
        // if form is empty, stop fonction execution
        if (empty($donnees_u)) {
            return;
        }

        $user = new UtilisateurEntity();

        if (($msg = $user->checkData($donnees_u)) === TRUE) {
            //$utilisateurModel = new UtilisateurModel($donnees_u);
            // $utilisateurModel->add();
        } else {
            throw new Exception(implode('<br />', $msg));
        }
        var_dump($msg);
    }
}
