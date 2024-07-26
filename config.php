<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Xendit\Configuration;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

Configuration::setXenditKey($_ENV['XENDIT_API_KEY']);

$servername = $_ENV['DB_SERVER'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_DATABASE'];
$dbport = $_ENV['DB_PORT'] ?? 3306;

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname, $dbport);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>