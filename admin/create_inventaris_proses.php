<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tgl_pendataan = $_POST['tgl_pendataan'];
    $nama_barang = $_POST['nama_barang'];
    $satuan = $_POST['satuan'];
    $keterangan = $_POST['keterangan'];
    $status = $_POST['status'];

    $sql = "INSERT INTO inventaris (tgl_pendataan, nama_barang, satuan, keterangan, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $tgl_pendataan, $nama_barang, $satuan, $keterangan, $status);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href='index_inventaris.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='create_inventaris.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
