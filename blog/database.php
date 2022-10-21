<?php

class Database {

    private static $dbHost = "localhost"; 
    private static $options = "UTF8" ;
    private static $dbName = "blog";
    private static $dbUsername = "localhost";
    private static $dbUserpassword = "1234";
    private static $connection = null;
    
    
    
    
    public static function connect() {
        if(self::$connection == null) {
            try {
              self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName . ";charset=" . self::$options , self::$dbUsername, self::$dbUserpassword);
              
            }
            catch(PDOException $e) {
                die($e->getMessage());
            }
        }

        return self::$connection;
    }
    
    public static function disconnect() {
        self::$connection = null;
    }
}

?>