<?php

require "../app/Autoloader.php";

App\Autoloader::register();

// //                                   test de l'autoload
// App\Utils::print_r_pre($_GET);

// on récupère la var p pour déterminer la page à afficher
$p = isset($_GET['p']) ? $_GET['p'] : "home" ;

// on détermine le parcours pour afficher la vue
$view = is_file("../views/$p.php") ? "../views/$p.php" : "../views/404.php";

// on se connecte à la database
$db = \App\Config::getDb();
// on fait une requête sur la DB en fonction de la route
switch($p){
    case "home":
        $posts = App\Tables\Posts::getAll($db);
        break;
    case "single":
        $id = isset($_GET['id']) && ((int)$_GET['id']*1)>0 ? $_GET['id'] : 22;
        $posts = $db->query("SELECT * FROM posts WHERE id =?" , "App\Tables\Posts",[$id]);
        break;
    case "categories":
        $categories = App\Tables\Categories::getAll();
        break;

} 

// on se déconnecte de la DB
$db = null;

// test : 
// App\Utils::print_r_pre($post);

// on charge la vue
ob_start(); // démarre la temporisation de sortie
require $view;
$view_content = ob_get_clean(); // fait le get content et le nettoie la mémoire tampon
require "../views/templates/default.php";