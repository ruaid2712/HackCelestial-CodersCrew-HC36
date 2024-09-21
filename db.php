<?php
// Database configuration
$host = "localhost";  // Database host (usually localhost)
$dbname = "pillai";  // The name of your database
$username = "root";  // Database username
$password = "";  // Database password (leave empty if no password is set on localhost)

// Create a connection using mysqli
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully to the database";
?>