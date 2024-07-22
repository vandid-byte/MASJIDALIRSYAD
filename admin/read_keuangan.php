<?php include('db_connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Keuangan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Keuangan</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Uang Masuk</th>
                    <th>Uang Keluar</th>
                    <th>Sisa Saldo</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM keuangan";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <th scope='row'>" . $row["id"] . "</th>
                            <td>" . $row["tanggal"] . "</td>
                            <td>" . number_format($row["uang_masuk"], 2) . "</td>
                            <td>" . number_format($row["uang_keluar"], 2) . "</td>
                            <td>" . number_format($row["sisa_saldo"], 1) . "</td>
                            <td>
                                <a href='update_keuangan.php?id=" . $row["id"] . "' class='btn btn-warning'>Edit</a>
                                <a href='delete_keuangan.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a>
                            </td>
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
