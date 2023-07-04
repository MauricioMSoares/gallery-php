<?php 
    $host = "localhost";
    $dbname = "gallery_php";
    $user = "root";
    $pass = "";
    $conn = new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);

    /*if ($conn) {
        echo("Database successfully connected");
    } else {
        echo("Connection failed");
    }*/
?>