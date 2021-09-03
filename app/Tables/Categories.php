<?php

namespace App\Tables;

use \App\Config;

class Categories extends Table{
    
    protected static $table = "categories";

    public function getUrl(){
        return "?p=category&id=".$this->id;
    }
}