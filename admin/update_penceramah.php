<?php include('db_connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Penceramah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Update Penceramah</h2>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM penceramah WHERE id='$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
                <form action="update_penceramah.php?id=<?php echo $id; ?>" method="POST">
                    <div class="form-group">
                        <label for="nama_penceramah">Nama Penceramah</label>
                        <input type="text" class="form-control" id="nama_penceramah" name="nama_penceramah" value="<?php echo $row['nama_penceramah']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No. Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $row['no_telp']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>

        <?php
            } else {
                echo "<p>Data tidak ditemukan</p>";
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama_penceramah = $_POST['nama_penceramah'];
            $alamat = $_POST['alamat'];
            $no_telp = $_POST['no_telp'];

            $sql = "UPDATE penceramah SET nama_penceramah='$nama_penceramah', alamat='$alamat', no_telp='$no_telp' WHERE id='$id'";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Record updated successfully'); window.location.href='read_penceramah.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        ?>
    </div>
</body>
</html>
