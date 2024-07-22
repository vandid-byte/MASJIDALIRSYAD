<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Inventaris</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Create Inventaris</h2>
    <form action="create_inventaris_proses.php" method="POST">
        <div class="form-group">
            <label for="tgl_pendataan">Tanggal Pendataan:</label>
            <input type="date" name="tgl_pendataan" id="tgl_pendataan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="satuan">Satuan:</label>
            <input type="number" name="satuan" id="satuan" class="form-control">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="tersedia">Tersedia</option>
                <option value="tidak tersedia">Tidak Tersedia</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="index_inventaris.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
