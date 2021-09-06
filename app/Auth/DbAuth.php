<?php

namespace App\Auth;

use App\Config;

class DbAuth{

    public function logged(){
        return isset($_SESSION['auth']);
    }

    public function login($email,$password){
        $user = Config::getDb()->query(
            "SELECT * FROM user WHERE password=? AND email =?", null, array(md5($password),$email));
        // var_dump($user);
        if(is_object(($user))){
            unset($user->password);
            $_SESSION['user']=$user;
        }
        return $user;
    }

}

?>