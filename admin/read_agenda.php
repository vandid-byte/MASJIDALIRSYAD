<?php include('db_connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Agenda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Agenda</h2>

        <!-- Tombol Kembali ke Dashboard -->
        <div class="mb-3">
            <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Agenda</th>
                    <th>Tanggal</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM agenda";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <th scope='row'>" . $row["id"] . "</th>
                            <td>" . $row["agenda"] . "</td>
                            <td>" . $row["tanggal"] . "</td>
                            <td>" . $row["jam_mulai"] . "</td>
                            <td>" . $row["jam_selesai"] . "</td>
                            <td>" . $row["keterangan"] . "</td>
                            <td>
                                <button class='btn btn-warning' data-toggle='modal' data-target='#updateModal' data-id='" . $row["id"] . "' data-agenda='" . $row["agenda"] . "' data-tanggal='" . $row["tanggal"] . "' data-jam_mulai='" . $row["jam_mulai"] . "' data-jam_selesai='" . $row["jam_selesai"] . "' data-keterangan='" . $row["keterangan"] . "'>Edit</button>
                                <a href='delete_agenda.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Update Agenda -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Agenda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateForm">
                    <div class="modal-body">
                        <input type="hidden" id="agenda_id" name="id">
                        <div class="form-group">
                            <label for="agenda">Agenda</label>
                            <input type="text" class="form-control" id="agenda" name="agenda" required>
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
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- AJAX Script -->
    <script>
    $('#updateModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var agenda = button.data('agenda');
        var tanggal = button.data('tanggal');
        var jam_mulai = button.data('jam_mulai');
        var jam_selesai = button.data('jam_selesai');
        var keterangan = button.data('keterangan');
        
        var modal = $(this);
        modal.find('#agenda_id').val(id);
        modal.find('#agenda').val(agenda);
        modal.find('#tanggal').val(tanggal);
        modal.find('#jam_mulai').val(jam_mulai);
        modal.find('#jam_selesai').val(jam_selesai);
        modal.find('#keterangan').val(keterangan);
    });

    $('#updateForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'update_agenda.php',
            data: $(this).serialize(),
            success: function(response) {
                $('#updateModal').modal('hide');
                location.reload(); // Reload the page to see changes
            },
            error: function(xhr, status, error) {
                alert('Error updating agenda.');
            }
        });
    });
    </script>
</body>
</html>
