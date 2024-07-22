<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM inventaris WHERE id_inventaris=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href='index_inventaris.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='index_inventaris.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
