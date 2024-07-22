<?php include('db_connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Keuangan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .form-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .input-group-text {
            min-width: 150px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="form-container">
                    <h2 class="text-center">Tambah Keuangan</h2>
                    <form action="create_keuangan.php" method="POST">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="form-group">
                            <label for="uang_masuk">Uang Masuk</label>
                            <input type="number" step="0.01" class="form-control" id="uang_masuk" name="uang_masuk" value="0.00" required>
                        </div>
                        <div class="form-group">
                            <label for="uang_keluar">Uang Keluar</label>
                            <input type="number" step="0.01" class="form-control" id="uang_keluar" name="uang_keluar" value="0.00" required>
                        </div>
                        <div class="form-group">
                            <label for="sisa_saldo">Sisa Saldo</label>
                            <input type="number" step="0.1" class="form-control" id="sisa_saldo" name="sisa_saldo">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $tanggal = $_POST['tanggal'];
                        $uang_masuk = $_POST['uang_masuk'];
                        $uang_keluar = $_POST['uang_keluar'];
                        $sisa_saldo = $_POST['sisa_saldo'];

                        $stmt = $conn->prepare("INSERT INTO keuangan (tanggal, uang_masuk, uang_keluar, sisa_saldo) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("ssss", $tanggal, $uang_masuk, $uang_keluar, $sisa_saldo);

                        if ($stmt->execute()) {
                            echo "<script>alert('Data berhasil ditambahkan'); window.location.href='read_keuangan.php';</script>";
                        } else {
                            echo "<script>alert('Error menambahkan data!'); window.location.href='create_keuangan.php';</script>";
                        }

                        $stmt->close();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
