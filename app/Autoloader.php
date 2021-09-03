<?php
namespace App;

class Autoloader
{

    public static function register()
    {
        spl_autoload_register(array(__CLASS__, "autoload"));
    }
    public static function autoload($class_name)
    {
        if (strpos($class_name, __NAMESPACE__ . '\\') === 0) { // pour loader seulement les class qui sont dans le namespace courant
            // $class_name = str_replace('App\\', "", $class_name); // autre façon de faire
            $class_name = str_replace(__NAMESPACE__.'\\',"",$class_name); 
            $class_name = str_replace('\\', "/", $class_name);

            require __DIR__."/$class_name.php"; // __DIR__ pour le dossier courant
        }
    }
}
