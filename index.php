<?php

session_start();

use controller\BackController;
use controller\Controller;
use library\Display;
use model\Model;

// Auto-loader
function myautoload($className)
{
    require(str_replace('\\', '/', $className) . '.php');
}
spl_autoload_register('myautoload');

if (empty($_GET)) { //if GET is empty, $page became home -> index
    $page = 'home';
} else {
    if (isset($_GET['page'])) { //if GET contain something, $page redirection to the  $page (index.php?page=panier) 
        $page = $_GET['page'];
        if (!file_exists("view/$page.php")) { //if the $page doesn't exist in the folder view, $page redirection to 404 error
            $page = '404';
        }
    }
}

if ($page == 'backoffice') {
    $controller = new BackController();
    $method = isset($_GET['action']) ? $_GET['action'] : 'dashboard';
} else {
    $controller = new Controller();
    $method = $page == '404' ?  $_GET['page'] : $page;
}
if (method_exists($controller, $method)) { //if method exist, use controller where method name like page 
    try {
        $data = $controller->$method($_POST); //controller use method where $_POST is use for register or connecte the user for example
    } catch (Exception $e) {
        $msg = "<div class='alert alert-danger' role='alert'>{$e->getMessage()}</div>";
    }
}

$display = new Display();
$model = new Model();
$categories = $model->getAll('Categorie');
ob_start(); //we stock on buffer(tampon) the element of variable
require("view/$page.php");
$content = ob_get_clean(); //we post the variable
require("view/template/template.php"); //require the template (header footer + html/css/boostrap)
