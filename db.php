<?php
$servername = "localhost"; // Database server
$username = "root";        // MySQL username (default in XAMPP is 'root')
$password = "";            // MySQL password (default in XAMPP is an empty string)
$dbname = "birdenstock"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
