<?php
$severance = "localhost";
$username = "root";
$password = "";
$dbname = "angkan_1";

// Create connection
$conn = new mysqli($severance, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
