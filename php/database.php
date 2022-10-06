<?php 

    $dbHost = "localhost";
    $dbName = "";
    $dbUser = "";
    $dbUserPassword = "";
    
    try
    {
        $connexion = new PDO("mysql:host=; dbname=","", "")
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
    }
?>