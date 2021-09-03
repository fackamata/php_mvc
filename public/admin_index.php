<?php

require "../app/Autoloader.php";

App\Autoloader::register();

// //                                   test de l'autoload
// App\Utils::print_r_pre($_GET);

// on récupère la var p pour déterminer la page à afficher
$p = isset($_GET['p']) ? $_GET['p'] : "home" ;

// on détermine le parcours pour afficher la vue
$view = is_file("../views/admin/$p.php") ? "../views/admin/$p.php" : "../views/admin/404.php";


// on fait une requête sur la DB en fonction de la route
switch($p){
    case "home":
   
        break;
    case "single":
        $id = isset($_GET['id']) && ((int)$_GET['id']*1)>0 ? $_GET['id'] : 22;
        $posts = \App\Tables\Posts::getOne($id);
        $siteTitle = \App\Config::getTitle();
        \App\Config::setTitle($posts[0]->title. " | ".$siteTitle );
        break;
    case "categories":
        $categories = App\Tables\Categories::getAll();
        break;
    case "category":
        $id = isset($_GET['id']) && ((int)$_GET['id']*1)>0 ? $_GET['id'] : 1;
        $category = App\Tables\Categories::getOne($id);
        $posts = App\Tables\Posts::getCat($id);
        break;

} 

// test : 
// App\Utils::print_r_pre($post);

// on charge la vue
ob_start(); // démarre la temporisation de sortie
require $view;
$view_content = ob_get_clean(); // fait le get content et le nettoie la mémoire tampon
require "../views/templates/adm.php";