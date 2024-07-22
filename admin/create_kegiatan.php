<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Kegiatan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Create Kegiatan</h2>
    <form action="read_kegiatan.php" method="post">
        <div class="form-group">
            <label for="nama_penceramah">Nama Penceramah:</label>
            <input type="text" name="nama_penceramah" id="nama_penceramah" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama_kegiatan">Nama Kegiatan:</label>
            <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jam_mulai">Jam Mulai:</label>
            <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jam_selesai">Jam Selesai:</label>
            <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="reset" class="btn btn-warning">Reset</button>
    </form>
</div>
</body>
</html>
