<?php 
$servername = "localhost";
$username = "mink";
$password = "MySQL@123";
$dbname = "crawlPractice";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//  Query for database
?>