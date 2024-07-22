<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin-Masjid Al Irsyad</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">E-Ummmat</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                  
                    
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../index.php">Logout</a></li>

                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                          <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Serba-serbi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="create_agenda.php">agenda</a>
                                    <a class="nav-link" href="create_infaq.php">infaq</a>
                                    <a class="nav-link" href="create_inventaris.php">inventaris</a>
                                    <a class="nav-link" href="read_jamaah.php">jamaah</a>
                                    <a class="nav-link" href="craete.keuangan.php">keuangan</a>
                                    <a class="nav-link" href="read_kritik_saran.php">kritik saran</a>
                                    <a class="nav-link" href="create_penceramah.php">penceramah</a>
                                </nav>
                            </div>
                                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Laporan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                                            <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="create_kegiatan.php">Jadwal Kegiatan</a>
                                            <a class="nav-link" href="laporan_keuangan.php">Laporan Keuangan</a>
                                            <a class="nav-link" href="laporan_uang_keluar_inventaris.php">Laporan Uang Keluar Pembelian Inventaris</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Cetak
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                           
                                </nav>
                            </div>
                          </div>
                    </div>
                    <div class="sb-sidenav-footer">
                    </div>
                </nav>
            </div>
    <div id="layoutSidenav_content">
        <main>
                </ol>
                <div class="container mt-5">
                    <div class="header-title">
                    <h2>DATA KEUANGAN</h2>
                    <div class="row">
                     <div class='col-xl-3 col-md-6 mb-4'>
                                    <div class='card bg-success text-white'>
                                        <div class='card-body'>Uang Masuk</div>
                                        <div class='card-footer d-flex align-items-center justify-content-between'>
                                            <span>rectangle</span>
                                            <a class='small text-white stretched-link' href='laporan_keuangan.php?type=masuk'>View Details</a>
                                        </div>
                                    </div>
                                  </div>
                                  <div class='col-xl-3 col-md-6 mb-4'>
                                    <div class='card bg-danger text-white'>
                                        <div class='card-body'>Uang Keluar</div>
                                        <div class='card-footer d-flex align-items-center justify-content-between'>
                                            <span>rectangle</span>
                                            <a class='small text-white stretched-link' href='laporan_keuangan.php?type=keluar'>View Details</a>
                                        </div>
                                    </div>
                                  </div>
                                  <div class='col-xl-3 col-md-6 mb-4'>
                                    <div class='card bg-warning text-white'>
                                        <div class='card-body'>Sisa Saldo</div>
                                        <div class='card-footer d-flex align-items-center justify-content-between'>
                                            <span>rectangle</span>
                                            <a class='small text-white stretched-link' href='laporan_keuangan.php?type=saldo'>View Details</a>
                                        </div>
                                    </div>
                                  </div>
                            </div>
                </div>
            </div>
        </main>
    </div>
                        </div>
                    </div>
                        </div>
                        <div>
                        
                                </div>
                                   </div>
                            </div>
                        </div>
                        <body>
  
    <div class="container mt-5">
        <div class="container">
        <div class="header-title">
        <h2>Data Agenda</h2>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Agenda</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Agenda</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM agenda";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                    <td>" . $row["id"] . "</td>
                                    <td>" . $row["agenda"] . "</td>
                                    <td>" . $row["tanggal"] . "</td>
                                    <td>" . $row["jam_mulai"] . "</td>
                                    <td>" . $row["jam_selesai"] . "</td>
                                    <td>" . $row["keterangan"] . "</td>
                                    <td>
                                        <a href='update_agenda.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Edit</a>
                                        <a href='delete_agenda.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Delete</a>
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
        </div>
    </div>
    <body>
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
        
            </tr>
        </thead>
        <tfoot>
            <tr>
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

                    </ul>
                </nav>
            </div>
        </div>
    </div>

    </div>       </div>
    </div>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
