<?php
$host = "localhost";
$user = "bookmark";
$pass = "!fO9a0v6";
try {
    $conn = new PDO("mysql:host=$host;dbname=demo_bookmark;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Database Connection Error: " . $e->getMessage();
    }
?>