<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_jamaah = $_POST['id_jamaah'];
    $uang_masuk = $_POST['uang_masuk'];
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];

    // Menangani upload foto
    $photo = $_FILES['photo']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($photo);
    move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);

    // Menyimpan data ke database
    $sql = "INSERT INTO infaq (id_jamaah, uang_masuk, keterangan, tanggal, photo) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("idsss", $id_jamaah, $uang_masuk, $keterangan, $tanggal, $photo);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success' role='alert'>Data berhasil dibuat!</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Kesalahan: " . $stmt->error . "</div>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Infaq</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Infaq</h2>
        <form action="create_infaq.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id_jamaah">ID Jamaah:</label>
                <input type="number" name="id_jamaah" id="id_jamaah" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="uang_masuk">Uang Masuk:</label>
                <input type="number" name="uang_masuk" id="uang_masuk" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <select name="keterangan" id="keterangan" class="form-control" required>
                    <option value="OPERASIONAL MASJID">OPERASIONAL MASJID</option>
                    <option value="GHARIN">GHARIN</option>
                    <option value="KHATIB JUMAT">KHATIB JUMAT</option>
                    <option value="MDTA">MDTA</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="photo">Foto:</label>
                <input type="file" name="photo" id="photo" class="form-control-file" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- JavaScript and Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
