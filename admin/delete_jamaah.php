<?php
include 'db_connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM jamaah WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>
        alert('Data jamaah berhasil dihapus.');
        window.location.href='read_jamaah.php';
    </script>";
} else {
    echo "<script>
        alert('Terjadi kesalahan saat menghapus data jamaah.');
    </script>";
}

$stmt->close();
$conn->close();
?>
