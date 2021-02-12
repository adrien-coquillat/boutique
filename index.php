<?php


require("controller/Controller.php"); //require the controller for use function 

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

$controller = new controller\Controller; //we use the controller on the folder controller for join the model and the view 

if (method_exists($controller, $methode = $page)) { //if method exist, use controller where method name like page 
    $controller->$methode($_POST); //controller use method where $_POST is use for register or connecte the user for example
}


ob_start(); //we stock on buffer(tampon) the element of variable
require("view/$page.php"); //require the view 
$content = ob_get_clean(); //we post the variable
require("view/template/template.php"); //require the template (header footer + html/css/boostrap)
