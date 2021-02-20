<?php

namespace controller;

use entity\UtilisateurEntity;
use Exception;
use model\Model;
use model\ProduitModel;
use model\UtilisateurModel;

class Controller
{
    public function inscription($donnee_u)
    {
        // if form is empty, stop fonction execution
        if (empty($donnee_u)) {
            return;
        }
        $user = new UtilisateurEntity($donnee_u);

        if (($msg = $user->checkData()) === TRUE) {

            $utilisateurModel = new UtilisateurModel();
            if ($utilisateurModel->isInDb($donnee_u)) {
                throw new Exception('Le login n\'est pas disponible');
            } else {
                $utilisateurModel->add($user);
                header('Location: index.php');
            }
        } else {
            throw new Exception(implode('<br />', $msg));
        }
    }

    public function connexion($donnee_u)
    {
        if (isset($donnee_u['login_u']) && isset($donnee_u['motdepass_u'])) {
            $utilisateurModel = new UtilisateurModel();
            $userData = $utilisateurModel->isInDb($donnee_u);
            $checkpassword = password_verify($donnee_u['motdepass_u'], $userData['motdepass_u']);
            if ($userData !== false) {
                if ($checkpassword === true) {
                    $_SESSION['user'] = $userData;
                    header('Location: index.php?page=profil');
                } else {
                    header('Location: index.php?page=home&error=connexion');
                }
            } else {
                header('Location: index.php?page=home&error=connexion');
            }
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

    public function produit($input)
    {
        if (isset($input['add'])) {
            // Function to add product in user bag
            header("Location: index.php?{$input['fromPage']}");
            exit();
        }
        $id_p = isset($_GET['id_p']) ? $_GET['id_p'] : 0;
        $model = new Model();
        if ($produit = $model->getByID($id_p, 'id_p', 'Produit')) {
            return compact('produit');
        } else {
            header("Location: index.php");
            exit();
        }
    }

    public function profil($donnee_u)
    {
        if (empty($donnee_u)) {
            return;
        }
        if (isset($_SESSION['user'])) {
            $user = new UtilisateurEntity($donnee_u);

            if (($msg = $user->checkData()) === TRUE) {
                $utilisateurModel = new UtilisateurModel();
                $userData = $utilisateurModel->isInDb($donnee_u);

                if ($userData !== false) {
                    throw new Exception('Le login n\'est pas disponible');
                } else {
                    $donnee_u['adresse_u'] = $user->adresse_u;
                    $donnee_u['id_u'] = $_SESSION['user']['id_u'];
                    $donnee_u['motdepass_u'] = password_hash($donnee_u['motdepass_u'], PASSWORD_DEFAULT);
                    $utilisateurModel->editProfil($donnee_u);
                    $_SESSION['user'] = $donnee_u;
                    header('Location: index.php');
                }
            } else {
                throw new Exception(implode('<br />', $msg));
            }
        }
    }
}
