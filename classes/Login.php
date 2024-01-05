<?php

namespace Classes;

class Login {

    public static function isLogged() {

        if (isset($_COOKIE['SNID'])){
            $token = $_COOKIE['SNID'];

            if(BDD::_query('SELECT token FROM login_tokens WHERE token=:token',['token'=>sha1($token)])){
                $user_id = BDD::_query('SELECT user_id FROM login_tokens WHERE token=:token',['token'=>sha1($token)])[0]['$user_id'];
                return $user_id;
            }
        }
        return false;
    }
}

?>