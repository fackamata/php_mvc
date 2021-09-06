<?php

require "../app/Autoloader.php";

App\Autoloader::register();

// //                                   test de l'autoload
// App\Utils::print_r_pre($_GET);

// on récupère la var p pour déterminer la page à afficher
$p = isset($_GET['p']) ? $_GET['p'] : "home" ;

session_start();

//              Autentification 
if ($p === "logout"){
    session_unset();
    // session_destroy(); // redondant
    //header("Location:./");
}

$auth = new \App\Auth\DbAuth();
if(!$auth->logged()){
    // header("HTTP/1.0 401 Unauthorized");
    // die('Not authorized');
    // $form = new \App\HTML\BootstrapForm($_POST);
    $p = "login";
}

// on détermine le parcours pour afficher la vue
$view = is_file("../views/admin/$p.php") ? "../views/admin/$p.php" : "../views/admin/404.php";


// on fait une requête sur la DB en fonction de la route
switch($p){
    case "login":
   
        break;
    case "home":

        break;
    case "single":

        break;
    case "categories":

        break;
    case "category":

        break;

} 

// test : 
// App\Utils::print_r_pre($post);

// on charge la vue
ob_start(); // démarre la temporisation de sortie
require $view;
$view_content = ob_get_clean(); // fait le get content et le nettoie la mémoire tampon
require "../views/templates/adm.php";