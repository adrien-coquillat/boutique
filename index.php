<?php

if (empty($_GET)) {
    ob_start(); //j'ouvre mon buffer(stock des informations sans les executers comme un tampon)
    require("view/home.php");
    $content = ob_get_clean(); //permet de sauvegarder les informations dans une variable 

    require("view/template/template.php");
} elseif ($_GET['page'] == "categorie") {
    ob_start();
    require("view/categorie.php");
    $content = ob_get_clean();

    require("view/template/template.php");
}
