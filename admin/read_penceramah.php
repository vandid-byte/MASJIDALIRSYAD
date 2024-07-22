<?php include('db_connection.php'); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penceramah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
        }
        .table th, .table td {
            text-align: center;
        }
        .table thead th {
            background-color: #343a40;
            color: #fff;
        }
        .btn {
            margin: 0 5px;
        }
        .header-title {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="dashboard.php" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>
        <div class="header-title">
            <h2>Daftar Penceramah</h2>
        </div>
        <?php
        // Pagination setup
        $limit = 10; // Number of records per page
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        // Get the total number of records
        $sql_count = "SELECT COUNT(*) AS total FROM penceramah";
        $result_count = $conn->query($sql_count);
        $total_records = $result_count->fetch_assoc()['total'];
        $total_pages = ceil($total_records / $limit);

        // Fetch records for the current page
        $sql = "SELECT * FROM penceramah LIMIT $start, $limit";
        $result = $conn->query($sql);
        ?>
        <table id="datatablesSimple" class="display table table-striped table-bordered">
    
        <thead>
            <tr>
                <th><input type="checkbox" id="select_all"></th> <!-- Checkbox to select all rows -->
                <th>ID</th>
                <th>Nama Penceramah</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th><input type="checkbox" id="select_all"></th>
                <th>ID</th>
                <th>Nama Penceramah</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["nama_penceramah"] . "</td>
                            <td>" . $row["alamat"] . "</td>
                            <td>" . $row["no_telp"] . "</td>
                            <td>
                                <a href='update_penceramah.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete_penceramah.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data penceramah.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <!-- Pagination controls -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php if ($page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page < $total_pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <!-- JavaScript and Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatablesSimple').DataTable({
                paging: false // Disable DataTables pagination to use the custom pagination
            });
        });
    </script>
</body>
</html>
