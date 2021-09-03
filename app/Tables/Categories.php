<?php

namespace App\Tables;

use \App\Config;

class Categories{
    
    private static $table = "categories";

    public static function getAll(){
        return Config::getDb()->query('SELECT * FROM '.self::$table.'ORDER BY id', __CLASS__);
    }
}