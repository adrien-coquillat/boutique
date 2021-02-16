<?php

namespace controller;

use model\UtilisateurModel;

class BackController
{
    public function dashboard($data)
    {
        $access = TRUE;
        if (!$access) {
            header('Location: index.php?page=home&error=accessdenied');
        }

        $userModel = new UtilisateurModel();

        $users = $userModel->getAll();

        return compact('users');
    }
}
