<?php
include 'config.php';

$sql = "SELECT p.nama_penceramah AS nama_penceramah, k.nama_kegiatan AS kegiatan, k.tanggal AS tanggal, k.jam_mulai AS jam_mulai, k.jam_selesai AS jam_selesai, k.keterangan AS keterangan 
        FROM kegiatan k 
        JOIN penceramah p ON k.id_penceramah = p.id 
        ORDER BY k.tanggal ASC, k.jam_mulai ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Kegiatan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Daftar Kegiatan</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Penceramah</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 1) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['nama_penceramah']}</td>
                            <td>{$row['kegiatan']}</td>
                            <td>{$row['tanggal']}</td>
                            <td>{$row['jam_mulai']}</td>
                            <td>{$row['jam_selesai']}</td>
                            <td>{$row['keterangan']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
$conn->close();
?>
