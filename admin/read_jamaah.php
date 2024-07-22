<?php include('db_connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Jamaah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <a href="dashboard.php" class="btn btn-primary mb-3">Kembali ke Dashboard</a>
        <h2>Daftar Jamaah</h2>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM jamaah";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . $row["id_jamaah"] . "</td>
                                    <td>" . $row["nama_jamaah"] . "</td>
                                    <td>" . $row["alamat"] . "</td>
                                    <td>" . $row["no_telp"] . "</td>
                                    <td>
                                        <a href='update_jamaah.php?id=" . $row["id_jamaah"] . "' class='btn btn-warning'>Edit</a>
                                        <a href='delete_jamaah.php?id=" . $row["id_jamaah"] . "' class='btn btn-danger'>Delete</a>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
