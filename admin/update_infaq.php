<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_jamaah = $_POST['id_jamaah'];
    $uang_masuk = $_POST['uang_masuk'];
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];

    // Menangani upload foto
    if ($_FILES['photo']['name']) {
        $photo = $_FILES['photo']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($photo);
        move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);
    } else {
        $photo = $_POST['existing_photo']; // Menggunakan foto yang ada jika tidak diubah
    }

    $sql = "UPDATE infaq SET id_jamaah=?, uang_masuk=?, keterangan=?, tanggal=?, photo=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("idssi", $id_jamaah, $uang_masuk, $keterangan, $tanggal, $photo, $id);

    if ($stmt->execute()) {
        echo "Data berhasil diperbarui";
    } else {
        echo "Kesalahan: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

// Mengambil data yang ada untuk diisi pada form
$sql = "SELECT * FROM infaq WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Infaq</title>
</head>
<body>
    <h2>Update Infaq</h2>
    <form action="update_infaq.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="id_jamaah">ID Jamaah:</label>
            <input type="number" name="id_jamaah" id="id_jamaah" value="<?php echo $row['id_jamaah']; ?>" required>
        </div>
        <div class="form-group">
            <label for="uang_masuk">Uang Masuk:</label>
            <input type="number" name="uang_masuk" id="uang_masuk" step="0.01" value="<?php echo $row['uang_masuk']; ?>" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <select name="keterangan" id="keterangan" required>
                <option value="OPERASIONAL MASJID" <?php if ($row['keterangan'] == 'OPERASIONAL MASJID') echo 'selected'; ?>>OPERASIONAL MASJID</option>
                <option value="GHARIN" <?php if ($row['keterangan'] == 'GHARIN') echo 'selected'; ?>>GHARIN</option>
                <option value="KHATIB JUMAT" <?php if ($row['keterangan'] == 'KHATIB JUMAT') echo 'selected'; ?>>KHATIB JUMAT</option>
                <option value="MDTA" <?php if ($row['keterangan'] == 'MDTA') echo 'selected'; ?>>MDTA</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" value="<?php echo $row['tanggal']; ?>" required>
        </div>
        <div class="form-group">
            <label for="photo">Foto:</label>
            <input type="file" name="photo" id="photo">
            <input type="hidden" name="existing_photo" value="<?php echo $row['photo']; ?>">
            <br>
            <img src="uploads/<?php echo $row['photo']; ?>" width="100" alt="Foto">
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>
