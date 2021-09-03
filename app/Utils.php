<?php

namespace App;

class Utils{

    /**
     * Fonction de traitement des champs input
     */
    static function clearInput($input){
        $strCleared = trim($input);
        $strCleared = strip_tags($strCleared);
        $strCleared = stripslashes($strCleared);
        $strCleared = str_replace("/", "", $strCleared);
        $strCleared = htmlspecialchars($strCleared, ENT_QUOTES);
        return $strCleared;
    }

    /**
     * Fonction pour faire un print_r avec <pre>
     */
    static function print_r_pre($var){
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }

    /**
     * Fonction pour faire un var_dump avec <pre>
     */
    static function var_dump_pre($var){
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }
}
