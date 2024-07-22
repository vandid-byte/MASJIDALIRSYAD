<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Data Infaq</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Isi Data Infaq</h2>
    <form action="create_infaq.php" method="post">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control">
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control">
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" step="0.01" name="jumlah" id="jumlah" class="form-control">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <select name="keterangan" id="keterangan" class="form-control">
                <option value="INFAQ">INFAQ</option>
                <option value="QURBAN">QURBAN</option>
                <option value="GHARIN">GHARIN</option>
                <option value="OPERASIONAL MDTA">OPERASIONAL MDTA</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">OK</button>
        <button type="reset" class="btn btn-warning">Batal</button>
    </form>
</div>
</body>
</html>
