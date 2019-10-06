<?php

$servername   = "localhost";
$db_username  = "root";
$db_password  = "";
$db_name      = "library_system";

// $conn = new mysqli($servername, $db_username, $db_password, $db_name);
//
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $db_username, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
