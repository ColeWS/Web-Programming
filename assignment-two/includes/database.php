<?php
    $serverName = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "lake_php";

    try {
        $connection = new PDO("mysql:host=$serverName; dbname=$database", "$username", "$password");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $error) {
        die("<p>Connection to database unsuccessful</p>");
    }
?>