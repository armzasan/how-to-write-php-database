<?php
$severance = "localhost";
$username = "root";
$password = "";
$dbname = "angkan_1";

// เชื่อมต่อ
$conn = new mysqli($severance, $username, $password, $dbname);

// เช็คว่าต่อเข้ากับฐานข้อมูลได้มั้ย
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
