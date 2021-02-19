<?php

namespace controller;

use entity\UtilisateurEntity;
use Exception;
use model\ProduitModel;
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
            $utilisateurModel = new UtilisateurModel();
            $utilisateurModel->add($user);
        } else {
            throw new Exception(implode('<br />', $msg));
        }
    }

    public function connexion($donnee_u)
    {
        $userModel = new UtilisateurModel();

        if ($userModel->connexion($donnee_u) == TRUE) {
            header('Location: index.php?page=pannier');
        } else {
            header('Location: index.php?page=home&error=connexion');
        }
    }

    public function home()
    {
        if (isset($_GET['error'])) {
            if (($_GET['error'] == 'connexion')) {
                $msg = 'Les identifiants sont incorrects.';
            } elseif ($_GET['error'] == 'accessdenied') {
                $msg = 'Accés refusé.';
            }
            throw new Exception($msg);
        }
    }

    public function categorie()
    {
        $produitModel = new ProduitModel();
        if (isset($_GET['id_sc'])) {
            $id_sc = (int) $_GET['id_sc'];
            $produits = $produitModel->BySous_categorie($id_sc);
        } else {
            $id_c = isset($_GET['id_c']) ? (int) $_GET['id_c'] : 1;
            $produits = $produitModel->ByCategorie($id_c);
        }
        return compact('produits');
    }
}
