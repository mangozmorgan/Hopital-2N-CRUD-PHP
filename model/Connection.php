<?php

class BddConnect{
  
    private static $dsn = 'mysql:host=localhost:3306;dbname=hospitale2n';
    private static $username = 'root';
    private static $password = '';
    private static $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    public static function connect (){
        try{
            $bdd = new PDO(
                self::$dsn,
                self::$username,
                self::$password,
                self::$options
            );

        }catch (\PDOexeption $e){
            echo " erreur de connexion ! : $e";
        }

        return $bdd;
    }
}