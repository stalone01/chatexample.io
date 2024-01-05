<?php
    namespace Classes;

    use \PDO;

    class BDD {
        //connexion a la bdd

        private static function _connect(){
            $bdd = new PDO('mysql:host=localhost;dbname=my_chat;charset=UTF8','root','');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $bdd;
        }

        //requette et fetch

        public static function _query($query, $params = []){
            $stmt = self::_connect()->prepare($query);
            $stmt->execute($params);

            if (explode('', $query)[0]==='SELECT'){
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
        }
    }

?>