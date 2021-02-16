<?php

namespace controller;

use model\Model;

class BackController
{
    public function dashboard()
    {
        $access = TRUE;
        if (!$access) {
            header('Location: index.php?page=home&error=accessdenied');
        }

        $model = new Model();

        $utilisateur = $model->getAll('Utilisateur');
        $categorie = $model->getAll('Categorie');
        $sous_categorie = $model->getAll('Sous_categorie');
        $composer = $model->getAll('Composer');
        $produit = $model->getAll('Produit');
        $commande = $model->getAll('Commande');

        return compact('utilisateur', 'categorie', 'sous_categorie', 'composer', 'produit', 'commande');
    }

    public function add($data)
    {
        if (isset($_GET['table'])) {
            $model = new Model();
            $table = ucfirst($_GET['table']);
            $model->add($data, $table);
        }
    }

    public function edit_del($data)
    {
        if (isset($_GET['table'])) {
            $model = new Model();
            $table = ucfirst($_GET['table']);
            $action = $data['submit'];
            unset($data['submit']);
            if ($action == 'edit') {
                $model->edit($data, $table);
            } elseif ($action == 'del') {
                $model->del($data, $table);
            }
        }
    }
}
