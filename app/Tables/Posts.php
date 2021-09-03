<?php
namespace App\Tables;

use \App\Config;

class Posts extends Table{

    public static function getAll(){

        return Config::getDb()->query("
        SELECT posts.*, categories.NomCategorie as category 
        FROM posts 
        LEFT JOIN categories 
        ON posts.categorie_id = categories.id 
        ORDER BY id DESC", __CLASS__); // __CLASS__ pour dire la classe dans laquel on se situe
    }

    public static function getCat($cat_id){

        return Config::getDb()->query("
        SELECT posts.*, categories.NomCategorie as category 
        FROM posts 
        LEFT JOIN categories 
        ON posts.categorie_id = categories.id 
        WHERE categories.id =?
        ORDER BY id DESC"
        , __CLASS__, [$cat_id]); // __CLASS__ pour dire la classe dans laquel on se situe
    }

    /**
     * fonction pour avoir un extrait de 120 caractères de notre text
     */
    public function getExcerpt(){
        return substr($this->text, 0, 120)."<a href='".$this->url."'> [...]</a>"; 
    }

    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getText(){
        return $this->text;
    }
    public function getImage(){
        return $this->image;
    }
    public function getThumb(){
        if(is_file("./image/".$this->image)){
            return $this->image;
        }
        return "oeuf.jpg";
    }

    public function getUrl(){
        return "?p=single&id=".$this->id;
    }
}