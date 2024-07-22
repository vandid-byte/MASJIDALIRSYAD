<?php include('db_connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Agenda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .form-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .input-group-text {
            min-width: 150px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="form-container">
                    <h2 class="text-center">Tambah Agenda</h2>
                    <form action="create_agenda.php" method="POST">
                        <div class="form-group">
                            <label for="agenda">Agenda</label>
                            <select class="form-control" id="agenda" name="agenda" required>
                                <option value="">Pilih Agenda</option>
                                <option value="Wirid Bulanan">Wirid Bulanan</option>
                                <option value="Tahsin Al-Quran">Tahsin Al-Quran</option>
                                <option value="Majelis Talim Ibu-Ibu">Majelis Talim Ibu-Ibu</option>
                                <option value="Kajian Sirah Nabawiyah">Kajian Sirah Nabawiyah</option>
                                <option value="Kajian Bulughul Maram">Kajian Bulughul Maram</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="form-group">
                            <label for="jam_mulai">Jam Mulai</label>
                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                        </div>
                        <div class="form-group">
                            <label for="jam_selesai">Jam Selesai</label>
                            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $agenda = $_POST['agenda'];
                        $tanggal = $_POST['tanggal'];
                        $jam_mulai = $_POST['jam_mulai'];
                        $jam_selesai = $_POST['jam_selesai'];
                        $keterangan = $_POST['keterangan'];

                        $stmt = $conn->prepare("INSERT INTO agenda (agenda, tanggal, jam_mulai, jam_selesai, keterangan) VALUES (?, ?, ?, ?, ?)");
                        $stmt->bind_param("sssss", $agenda, $tanggal, $jam_mulai, $jam_selesai, $keterangan);

                        if ($stmt->execute()) {
                            echo "<script>alert('Data berhasil ditambahkan'); window.location.href='read_agenda.php';</script>";
                        } else {
                            echo "<script>alert('Error menambahkan data!'); window.location.href='create_agenda.php';</script>";
                        }

                        $stmt->close();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
