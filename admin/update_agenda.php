<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $agenda = $_POST['agenda'];
    $tanggal = $_POST['tanggal'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $keterangan = $_POST['keterangan'];

    // Update data ke database
    $sql = "UPDATE agenda SET agenda = ?, tanggal = ?, jam_mulai = ?, jam_selesai = ?, keterangan = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssi', $agenda, $tanggal, $jam_mulai, $jam_selesai, $keterangan, $id);

    if ($stmt->execute()) {
        echo "Agenda updated successfully!";
    } else {
        echo "Error updating agenda: " . $stmt->error;
    }
}
?>
