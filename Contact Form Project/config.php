<?php
/**
 * Created by PhpStorm.
 * User: blair
 * Date: 4/26/18
 * Time: 9:44 AM
 */
$host = "localhost";
$userName = "bw2335";
$password = "CsnVWnSz";
$dbName = "bw2335";



// Create database connection
$conn = new mysqli($host, $userName, $password, $dbName);

//Check Connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}


?>
