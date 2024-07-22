<?php
include 'db_connection.php'; // Pastikan jalur ini sesuai dengan lokasi file db_connection.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_jamaah = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    $sql = "INSERT INTO jamaah (nama_jamaah, alamat, no_telp) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nama_jamaah, $alamat, $no_telp);

    if ($stmt->execute()) {
        echo "<script>
            alert('Jamaah berhasil ditambahkan.');
            window.location.href='../index.php'; // Redirect to index.php or the relevant page
        </script>";
    } else {
        echo "<script>
            alert('Terjadi kesalahan saat menambahkan jamaah.');
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
