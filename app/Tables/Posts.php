<?php
namespace App\Tables;

class Posts{

    public static function getAll($db){

        return $db->query("SELECT * FROM posts ORDER BY id DESC", __CLASS__); // __CLASS__ pour dire la classe dans laquel on se situe
    }

    /**
     *  si une propriété n'existe pas mais qu'elle appelé
     * cette fonction créer à la volé
     */
    public function __get($key)
    {
        $method = 'get'.ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
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