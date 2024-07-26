<?php
// Database configuration
$servername = "localhost";
$username = ""; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "masjidalirsyad2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
