<?php

namespace App\Tables;

use \App\Config;

class Categories extends Table{
    
    protected static $table = "categorie";

    public static function getAll(){
        return Config::getDb()->query(
            "SELECT * FROM ".self::$table." ORDER BY Categorieid ", __CLASS__);
    }
}