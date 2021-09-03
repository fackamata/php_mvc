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

    public static function getAll(){
        return Config::getDb()->query(
            "SELECT * FROM ".static::getTable()." ORDER BY id", get_called_class());
    }

    public static function getCount(){
        return Config::getDb()->query(
            "SELECT DISTINCT COUNT(id) as count FROM ".static::getTable(), get_called_class());
    }

    public static function getOne($id){
        return Config::getDb()->query(
            "SELECT * FROM ".static::getTable()." WHERE id=?", get_called_class() ,[$id]);
    }

    /**
     *  si une propriété n'existe pas mais qu'elle appelé
     * cette fonction créer à la volé
     */
    public function __get($key){
        $method = 'get'.ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    

}