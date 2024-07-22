<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_kegiatan = $_POST['nama_kegiatan'];
        $tanggal = $_POST['tanggal'];
        $jam_mulai = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];
        $keterangan = $_POST['keterangan'];
        $id_penceramah = $_POST['id_penceramah'];

        $sql_update = "UPDATE kegiatan SET nama_kegiatan=?, tanggal=?, jam_mulai=?, jam_selesai=?, keterangan=?, id_penceramah=? WHERE id=?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("sssssii", $nama_kegiatan, $tanggal, $jam_mulai, $jam_selesai, $keterangan, $id_penceramah, $id);

        if ($stmt_update->execute()) {
            echo "<script>
                alert('Data berhasil diupdate.');
                window.location.href='read_kegiatan.php';
            </script>";
        } else {
            echo "<script>
                alert('Terjadi kesalahan saat mengupdate data.');
                window.location.href='update_kegiatan.php?id=$id';
            </script>";
        }

        $stmt_update->close();
        $conn->close();
    } else {
        $sql_select = "SELECT * FROM kegiatan WHERE id=?";
        $stmt_select = $conn->prepare($sql_select);
        $stmt_select->bind_param("i", $id);
        $stmt_select->execute();
        $result = $stmt_select->get_result();
        $kegiatan = $result->fetch_assoc();
        $stmt_select->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Kegiatan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Update Kegiatan</h2>
    <form action="update_kegiatan.php?id=<?php echo $id; ?>" method="post">
        <div class="form-group">
            <label for="nama_penceramah">Nama Penceramah:</label>
            <input type="text" name="nama_penceramah" id="nama_penceramah" class="form-control" value="<?php echo $kegiatan['nama_penceramah']; ?>" required>
        </div>
        <div class="form-group">
            <label for="nama_kegiatan">Nama Kegiatan:</label>
            <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" value="<?php echo $kegiatan['nama_kegiatan']; ?>" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $kegiatan['tanggal']; ?>" required>
        </div>
        <div class="form-group">
            <label for="jam_mulai">Jam Mulai:</label>
            <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" value="<?php echo $kegiatan['jam_mulai']; ?>" required>
        </div>
        <div class="form-group">
            <label for="jam_selesai">Jam Selesai:</label>
            <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" value="<?php echo $kegiatan['jam_selesai']; ?>" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" id="keterangan" class="form-control" required><?php echo $kegiatan['keterangan']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <button type="reset" class="btn btn-warning">Reset</button>
    </form>
</div>
</body>
</html>
