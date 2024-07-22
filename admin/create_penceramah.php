<?php include('db_connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Penceramah</title>
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
                    <h2 class="text-center">Tambah Penceramah</h2>
                    <form action="create_penceramah.php" method="POST">
                        <div class="form-group">
                            <label for="nama_penceramah">Nama Penceramah</label>
                            <input type="text" class="form-control" id="nama_penceramah" name="nama_penceramah" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No. Telepon</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $nama_penceramah = $_POST['nama_penceramah'];
                        $alamat = $_POST['alamat'];
                        $no_telp = $_POST['no_telp'];

                        $stmt = $conn->prepare("INSERT INTO penceramah (nama_penceramah, alamat, no_telp) VALUES (?, ?, ?)");
                        $stmt->bind_param("sss", $nama_penceramah, $alamat, $no_telp);

                        if ($stmt->execute()) {
                            echo "<script>alert('Data berhasil ditambahkan'); window.location.href='read_penceramah.php';</script>";
                        } else {
                            echo "<script>alert('Error menambahkan data!'); window.location.href='create_penceramah.php';</script>";
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
