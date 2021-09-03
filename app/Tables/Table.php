<?php

namespace App\Tables;
use \App\Config;

class Table{

    protected static $table;
/**
 *  @return string qui permet de manipuler la table correspondante
 *  Le nom de la table est identique au nom de la class mais en minuscule
 */
    private static function getTable(){
        // static est équivalent à self, mais pour une propriété
        // get_called_class() : pour récupérer la class appelée
        if(static::$table === null){
            $class_name = explode('\\', get_called_class());
            static::$table = strtolower(end($class_name)); // end() pour récupérer le dernier élément du tableau
        }
        return static::$table;
    }

}