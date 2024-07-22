<?php
include 'db_connection.php';

$sql = "SELECT * FROM infaq";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Infaq</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Data Infaq</h2>
        <a href="dashboard.php" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>
        <?php
        if ($result->num_rows > 0) {
            echo "<table class='table table-striped table-bordered'>
                    <thead class='thead-dark'>
                        <tr>
                            <th>ID</th>
                            <th>ID Jamaah</th>
                            <th>Uang Masuk</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["id_jamaah"]."</td>
                        <td>".$row["uang_masuk"]."</td>
                        <td>".$row["keterangan"]."</td>
                        <td>".$row["tanggal"]."</td>
                        <td><img src='uploads/".$row["photo"]."' class='img-thumbnail' width='100' alt='Foto'></td>
                        <td>
                            <a href='update_infaq.php?id=".$row["id"]."' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete_infaq.php?id=".$row["id"]."' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                        </td>
                      </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-info' role='alert'>Tidak ada data.</div>";
        }
        $conn->close();
        ?>
    </div>

    <!-- JavaScript and Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
