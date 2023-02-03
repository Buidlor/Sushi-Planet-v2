<?php
    define('DB_HOST', 'database');
    define('USER', 'root');
    define('PASSWORD', 'root');
    define('DATABASE', 'mydb');
    try{
        $connection = new PDO('mysql:host='.DB_HOST.';dbname='.DATABASE, USER, PASSWORD);

        $drinks = $connection->prepare("SELECT * FROM menu where MenuType = 'Drinks'");
        $drinks->execute();
        $drinks = $drinks->fetchAll(PDO::FETCH_ASSOC);
      
        $appetizers = $connection->prepare("SELECT * FROM menu where MenuType = 'Appetizers'");
        $appetizers->execute();
        $appetizers = $appetizers->fetchAll(PDO::FETCH_ASSOC);
      
        $starters = $connection->prepare("SELECT * FROM menu where MenuType = 'Starters'");
        $starters->execute();
        $starters = $starters->fetchAll(PDO::FETCH_ASSOC);
      
        $mains = $connection->prepare("SELECT * FROM menu where MenuType = 'Main course'");
        $mains->execute();
        $mains = $mains->fetchAll(PDO::FETCH_ASSOC);
      
        $desserts = $connection->prepare("SELECT * FROM menu where MenuType = 'Desserts'");
        $desserts->execute();
        $desserts = $desserts->fetchAll(PDO::FETCH_ASSOC);
      
        $menus= $connection->prepare("SELECT DISTINCT MenuType FROM menu");
        $menus->execute();
        $menus = $menus->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>