<?php
    include('secret.php');
    define('DB_HOST', MYSQL_HOST);
    define('USER', MYSQL_ROOT_USER);
    define('PASSWORD', MYSQL_ROOT_PASSWORD);
    define('DATABASE',MYSQL_DATABASE);
    try{
        $connection = new PDO('mysql:host='.DB_HOST.';dbname='.DATABASE, USER, PASSWORD);

        $contactForm = $connection->prepare("SELECT * FROM contactform");
        $contactForm->execute();
        $contactForm = $contactForm->fetchAll(PDO::FETCH_ASSOC);

        $fullMenu = $connection->prepare("SELECT * FROM menu");
        $fullMenu->execute();
        $fullMenu = $fullMenu->fetchAll(PDO::FETCH_ASSOC);

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

        $images = $connection->prepare("SELECT * FROM images");
        $images->execute();
        $images = $images->fetchAll(PDO::FETCH_ASSOC);

        
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>