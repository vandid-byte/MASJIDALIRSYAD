<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_penceramah = $_POST['nama_penceramah'];
    $nama_kegiatan = $_POST['nama_kegiatan'];
    $tanggal = $_POST['tanggal'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];
    $keterangan = $_POST['keterangan'];

    // Insert into penceramah table
    $sql_penceramah = "INSERT INTO penceramah (nama_penceramah) VALUES (?)";
    $stmt_penceramah = $conn->prepare($sql_penceramah);
    $stmt_penceramah->bind_param("s", $nama_penceramah);

    if ($stmt_penceramah->execute()) {
        $id_penceramah = $stmt_penceramah->insert_id;

        // Insert into kegiatan table
        $sql_kegiatan = "INSERT INTO kegiatan (nama_kegiatan, tanggal, jam_mulai, jam_selesai, keterangan, id_penceramah) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_kegiatan = $conn->prepare($sql_kegiatan);
        $stmt_kegiatan->bind_param("sssssi", $nama_kegiatan, $tanggal, $jam_mulai, $jam_selesai, $keterangan, $id_penceramah);

        if ($stmt_kegiatan->execute()) {
            echo "<script>
                alert('Data berhasil dimasukkan.');
                window.location.href='read_kegiatan.php';
            </script>";
        } else {
            echo "<script>
                alert('Terjadi kesalahan saat mengirim data kegiatan.');
                window.location.href='create_kegiatan.php';
            </script>";
        }

        $stmt_kegiatan->close();
    } else {
        echo "<script>
            alert('Terjadi kesalahan saat mengirim data penceramah.');
            window.location.href='create_kegiatan.php';
        </script>";
    }

    $stmt_penceramah->close();
    $conn->close();
}
?>
