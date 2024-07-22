<?php include('db_connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Keuangan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Update Keuangan</h2>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM keuangan WHERE id='$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
                <form action="update_keuangan.php?id=<?php echo $id; ?>" method="POST">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" value="<?php echo $row['tanggal']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="uang_masuk">Uang Masuk</label>
                        <input type="number" step="0.01" class="form-control" name="uang_masuk" value="<?php echo $row['uang_masuk']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="uang_keluar">Uang Keluar</label>
                        <input type="number" step="0.01" class="form-control" name="uang_keluar" value="<?php echo $row['uang_keluar']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="sisa_saldo">Sisa Saldo</label>
                        <input type="number" step="0.1" class="form-control" name="sisa_saldo" value="<?php echo $row['sisa_saldo']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>

        <?php
            } else {
                echo "<p>Data tidak ditemukan</p>";
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tanggal = $_POST['tanggal'];
            $uang_masuk = $_POST['uang_masuk'];
            $uang_keluar = $_POST['uang_keluar'];
            $sisa_saldo = $_POST['sisa_saldo'];

            $sql = "UPDATE keuangan SET tanggal='$tanggal', uang_masuk='$uang_masuk', uang_keluar='$uang_keluar', sisa_saldo='$sisa_saldo' WHERE id='$id'";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Record updated successfully'); window.location.href='read_keuangan.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        ?>
    </div>
</body>
</html>
