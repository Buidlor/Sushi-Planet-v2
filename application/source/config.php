<?php
    define('DB_HOST', 'database');
    define('USER', 'root');
    define('PASSWORD', 'root');
    define('DATABASE', 'mydb');
    try{
        $connection = new PDO('mysql:host='.DB_HOST.';dbname='.DATABASE, USER, PASSWORD);
    }catch(PDOException $e){
        echo $e->getMessage();
    }

    // Read Json file
    $json = file_get_contents('/data/contactform.json');
    $json_data = json_decode($json, true);

    // Prepare SQL statement
    $sql = "INSERT INTO contactform (FirstName, SurName, Email, Subject, Message) VALUES (:FirstName, :SurName, :Email, :Subject, :Message)";
    $stmt = $connection->prepare($sql);

    // Loop through each data item and insert into database
    foreach ($json_data as $item) {
        $stmt->execute([
            'FirstName' => $item['FirstName'],
            'SurName' => $item['SurName'],
            'Email' => $item['Email'],
            'Subject' => $item['Subject'],
            'Message' => $item['Message']
        ]);
    }
?>