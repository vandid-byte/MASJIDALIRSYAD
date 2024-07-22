<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM inventaris WHERE id_inventaris=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tgl_pendataan = $_POST['tgl_pendataan'];
    $nama_barang = $_POST['nama_barang'];
    $satuan = $_POST['satuan'];
    $keterangan = $_POST['keterangan'];
    $status = $_POST['status'];

    $sql = "UPDATE inventaris SET tgl_pendataan=?, nama_barang=?, satuan=?, keterangan=?, status=? WHERE id_inventaris=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssissi", $tgl_pendataan, $nama_barang, $satuan, $keterangan, $status, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diperbarui'); window.location.href='index_inventaris.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='update_inventaris.php?id=$id';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Inventaris</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Update Inventaris</h2>
    <form action="update_inventaris.php?id=<?php echo $id; ?>" method="POST">
        <div class="form-group">
            <label for="tgl_pendataan">Tanggal Pendataan:</label>
            <input type="date" name="tgl_pendataan" id="tgl_pendataan" class="form-control" value="<?php echo $data['tgl_pendataan']; ?>" required>
        </div>
        <div class="form-group">
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?php echo $data['nama_barang']; ?>" required>
        </div>
        <div class="form-group">
            <label for="satuan">Satuan:</label>
            <input type="number" name="satuan" id="satuan" class="form-control" value="<?php echo $data['satuan']; ?>">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" id="keterangan" class="form-control"><?php echo $data['keterangan']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="tersedia" <?php echo ($data['status'] == 'tersedia') ? 'selected' : ''; ?>>Tersedia</option>
                <option value="tidak tersedia" <?php echo ($data['status'] == 'tidak tersedia') ? 'selected' : ''; ?>>Tidak Tersedia</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index_inventaris.php" class="btn btn-secondary">Cancel</a
        <a href="index_inventaris.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
