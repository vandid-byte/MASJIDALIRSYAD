<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "masjidalirsyad2";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
