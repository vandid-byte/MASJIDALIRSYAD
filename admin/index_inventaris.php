<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventaris List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>List Inventaris</h2>
    <a href="create_inventaris.php" class="btn btn-primary mb-3">Add New</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal Pendataan</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM inventaris";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['id_inventaris']}</td>";
                echo "<td>{$row['tgl_pendataan']}</td>";
                echo "<td>{$row['nama_barang']}</td>";
                echo "<td>{$row['satuan']}</td>";
                echo "<td>{$row['keterangan']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "<td>
                    <a href='update_inventaris.php?id={$row['id_inventaris']}' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='delete_inventaris.php?id={$row['id_inventaris']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this item?')\">Delete</a>
                </td>";
                echo "</tr>";
            }

            $result->free();
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
</body>
</html>
