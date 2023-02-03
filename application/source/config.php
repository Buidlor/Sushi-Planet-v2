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

        $images = $connection->prepare("SELECT * FROM images");
        $images->execute();
        $images = $images->fetchAll(PDO::FETCH_ASSOC);


        $stringDrinks= '';
        foreach ($drinks as $drink) {
          $stringDrinks .= <<<EOD
          <li class="list-group-item">
              <div class="d-flex justify-content-between align-items-center">
              <span><strong>{$drink['Course']}:</strong> {$drink['CourseDescription']}</span> <span class="badge bg-primary">€{$drink['CoursePrice']}</span>
              </div>
          </li>
          EOD;
        }

        $stringAppetizers= '';
        foreach ($appetizers as $appetizer) {
          $stringAppetizers .= <<<EOD
          <li class="list-group-item">
              <div class="d-flex justify-content-between align-items-center">
              <span><strong>{$appetizer['Course']}:</strong> {$appetizer['CourseDescription']}</span> <span class="badge bg-primary">€{$appetizer['CoursePrice']}</span>
              </div>
          </li>
          EOD;
        }

        $stringStarters= '';
        foreach ($starters as $starter) {
          $stringStarters .= <<<EOD
          <li class="list-group-item">
              <div class="d-flex justify-content-between align-items-center">
              <span><strong>{$starter['Course']}:</strong> {$starter['CourseDescription']}</span> <span class="badge bg-primary">€{$starter['CoursePrice']}</span>
              </div>
          </li>
          EOD;
        }

        $stringMains= '';
        foreach ($mains as $main) {
          $stringMains .= <<<EOD
          <li class="list-group-item">
              <div class="d-flex justify-content-between align-items-center">
              <span><strong>{$main['Course']}:</strong> {$main['CourseDescription']}</span> <span class="badge bg-primary">€{$main['CoursePrice']}</span>
              </div>
          </li>
          EOD;
        }

        $stringDesserts= '';
        foreach ($desserts as $dessert) {
          $stringDesserts .= <<<EOD
          <li class="list-group-item">
              <div class="d-flex justify-content-between align-items-center">
              <span><strong>{$dessert['Course']}:</strong> {$dessert['CourseDescription']}</span> <span class="badge bg-primary">€{$dessert['CoursePrice']}</span>
              </div>
          </li>
          EOD;
        }

        $imagePages = '';
        
        $imagePages = <<<EOD
        <li class="page-item" aria-current="page">
            <button class="page-link" type="button" data-bs-target="#gals" data-bs-slide-to="0"
              class="active">1</button>
        </li>
        EOD;

        $stringImages = '';

        
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>