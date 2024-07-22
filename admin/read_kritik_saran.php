<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Read Kritik & Saran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .pagination {
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2>Kritik & Saran</h2>

        <!-- Tombol Kembali ke Dashboard -->
        <div class="mb-3">
            <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>

        <!-- Form Pencarian -->
        <form method="GET" class="mb-3">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <input type="text" name="search" class="form-control mb-2" placeholder="Cari berdasarkan Nama atau Email" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Cari</button>
                </div>
            </div>
        </form>

        <?php
        // Konfigurasi paginasi
        $results_per_page = 3; // Jumlah entri per halaman
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $start_from = ($page - 1) * $results_per_page;

        // Pencarian
        $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

        // Query untuk menghitung total record
        $sql_total = "SELECT COUNT(*) AS total FROM kritik_saran WHERE nama LIKE '%$search%' OR email LIKE '%$search%'";
        $result_total = $conn->query($sql_total);
        $row_total = $result_total->fetch_assoc();
        $total_records = $row_total['total'];
        $total_pages = ceil($total_records / $results_per_page);

        // Query untuk mengambil data dengan paginasi dan pencarian
        $sql = "SELECT * FROM kritik_saran WHERE nama LIKE '%$search%' OR email LIKE '%$search%' LIMIT $start_from, $results_per_page";
        $result = $conn->query($sql);

        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Pesan</th>
                    <th>Waktu Submit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['nomor_hp']}</td>
                            <td>{$row['pesan']}</td>
                            <td>{$row['waktu_submit']}</td>
                            <td>
                                <form class='d-inline' method='POST' action='delete_kritik_saran.php'>
                                    <input type='hidden' name='id' value='{$row['id']}'>
                                    <button type='submit' class='btn btn-danger'>Hapus</button>
                                </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Paginasi -->
        <nav>
            <ul class="pagination">
                <?php
                // Previous page button
                if ($page > 1) {
                    echo "<li class='page-item'><a class='page-link' href='read_kritik_saran.php?page=" . ($page - 1) . "&search=$search'>Previous</a></li>";
                }

                // Page numbers
                for ($i = 1; $i <= $total_pages; $i++) {
                    $active = $i == $page ? "active" : "";
                    echo "<li class='page-item $active'><a class='page-link' href='read_kritik_saran.php?page=$i&search=$search'>$i</a></li>";
                }

                // Next page button
                if ($page < $total_pages) {
                    echo "<li class='page-item'><a class='page-link' href='read_kritik_saran.php?page=" . ($page + 1) . "&search=$search'>Next</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>
</body>
</html>
