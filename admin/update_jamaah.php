<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    $sql = "UPDATE jamaah SET nama = ?, alamat = ?, no_telp = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nama, $alamat, $no_telp, $id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Data jamaah berhasil diperbarui.');
            window.location.href='read_jamaah.php';
        </script>";
    } else {
        echo "<script>
            alert('Terjadi kesalahan saat memperbarui data jamaah.');
        </script>";
    }

    $stmt->close();
    $conn->close();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM jamaah WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $nama = $row['nama'];
    $alamat = $row['alamat'];
    $no_telp = $row['no_telp'];

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Jamaah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Jamaah</h2>
        <form action="update_jamaah.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $nama; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $alamat; ?>" required>
            </div>
            <div class="form-group">
                <label for="no_telp">No. Telepon:</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control" value="<?php echo $no_telp; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
