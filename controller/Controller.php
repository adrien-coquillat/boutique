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

        $userEntity = new UtilisateurEntity();

        if (($msg = $userEntity->checkData($donnees_u)) === TRUE) {
            //$utilisateurModel = new UtilisateurModel($donnees_u);
            // $utilisateurModel->add();
        } else {
            throw new Exception(implode('<br />', $msg));
        }
        var_dump($msg);
    }

    public function connexion($donnee_u)
    {
        $userModel = new UtilisateurModel();

        if ($userModel->connexion($donnee_u) == TRUE) {
            header('Location: index.php?page=pannier');
        } else {
            header('Location: index.php?page=home&error=message');
        }
    }

    public function home()
    {
        if (isset($_GET['error']) && ($_GET['error'] == 'message')) {
            $msg = 'Les identifiants sont incorrects.';
            throw new Exception($msg);
        }
    }
}
