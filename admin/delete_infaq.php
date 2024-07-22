<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM infaq WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Data berhasil dihapus";
} else {
    echo "Kesalahan: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
