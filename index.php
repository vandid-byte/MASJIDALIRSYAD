<?php
require_once(__DIR__ . '/vendor/autoload.php');

use Xendit\Configuration;
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

Configuration::setXenditKey($_ENV['XENDIT_API_KEY']);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MASJID AL IRSYAD</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigasi-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        
        <a class="btn btn-primary" href="admin/login.php">Sign Up</a> <!-- Tombol Sign Up -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProfil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profil Masjid <i class="fas fa-angle-down"></i>
                    </a>
                       <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#about">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#team">Pengurus</a></li>
                <li class="nav-item"><a class="nav-link" href="#admin/create_jamaah.php" data-toggle="modal" data-target="#jamaahModal">Jamaah</a></li>
                <li class="nav-item"><a class="nav-link" href="#admin/create_infaq.php">Infaq</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Kritik & Saran</a></li>
            </ul>
        </div>
    </nav>

    <!-- Jamaah Form Modal -->
    <div class="modal fade" id="jamaahModal" tabindex="-1" role="dialog" aria-labelledby="jamaahModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="jamaahModalLabel">Tambah Jamaah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="admin/create_jamaah.php" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No. Telepon:</label>
                            <input type="text" name="no_telp" id="no_telp" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
.navbar-nav {
    flex-direction: row;
}

.nav-item {
    padding-left: 10px;
    padding-right: 10px;
}></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 <!-- Modal Jamaah -->
 
    <!-- Bootstrap core JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
</head>
<body>
    <!-- Infaq Form Modal -->
    <div class="modal fade" id="infaqModal" tabindex="-1" role="dialog" aria-labelledby="infaqModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infaqModalLabel">Tambah/Update Infaq</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="admin/create_infaq.php" action="api/payment.php" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                        </div> -->
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomor HP:</label>
                            <input type="phone" name="no_hp" id="no_hp" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah:</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan:</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
                        </div>
                        <input type="hidden" name="id_infaq" id="id_infaq"> <!-- Hidden field for editing existing data -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
        <!--SELAMAT DATANG-->
 <style>
                            .masthead {
                                background-color: #f8f9fa;
                                padding: 100px 0;
                                text-align: center;
                            }
                            .masthead-subheading {
                                font-size: 36px;
                                font-weight: bold;
                                animation: changeText 5s infinite; /* Animasi ganti teks */
                            }
                            
                        
                        </style>
                    </head>
                    <body>
                        <header class="masthead">
                            <div class="container">
                                <div class="masthead-subheading">Selamat Datang</div>
                                <div class="masthead-subheading">SISTEM INFORMASI <span class="italic">E-UMMAT</span> MASJID AL IRSYAD</div>
                                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Beranda</a>
                            </div>
                        </header>
        <!-- Services-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">PENGURUS MASJID AL IRSYAD KOTA PADANG</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/AWN.jpg" alt="..." />
                            <h4>DR.H.ABDULLAH WALI NASUTION</h4>
                            <p class="text-muted">KETUA</p>
                           
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/JOHARDI.JPG" alt="..." />
                            <h4>DRS.H.JOHARDI DT BANDARO PUTIAH</h4>
                            <p class="text-muted">PEMBINA</p>
                           
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="..." />
                            <h4>DR.RAHMAD DARMAWAN SPD.I M.PD</h4>
                            <p class="text-muted">Lead Developer</p>
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">About</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>2009-2011</h4>
                                <h4 class="subheading">Our Humble Beginnings</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>March 2011</h4>
                                <h4 class="subheading">An Agency is Born</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>December 2015</h4>
                                <h4 class="subheading">Transition to Full Service</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                    <div class="timeline-image">
                        <img class="rounded-circle img-fluid" src="assets/R.PNG" alt="..." />
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Informasi Rekening</h4>
                            <h4 class="subheading">MASJID AL IRSYAD</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">
                                Nomor Rekening: 7900308277<br>
                                Nama Pemilik: ROMMY IVANDIKA HARIS
                            </p>
                        </div>
                    </div>
                </li>
                <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mx-auto">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body text-center">
                                <h5 class="card-title">SALDO SAAT INI</h5>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                <p class="card-title">Rp.50.000.000</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
       
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

          </section>
          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
        </html>

        </section>
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact-->
<section class="page-section" id="contact">
    <div class="contact-background">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">KRITIK & SARAN</h2>
                <h3 class="section-subheading text-muted">JIKA ADA KEKURANGAN DALAM PELAYANAN KAMI BERIKAN SARAN DAN MASUKKAN</h3>
 </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form id="contactForm" method="post" action="admin/submit_kritik_saran.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="name" name="nama" type="text" placeholder="NAMA *" required />
                                    <div class="invalid-feedback">Mohon isi nama.</div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="EMAIL *" required />
                                    <div class="invalid-feedback">Mohon isi email dengan format yang benar.</div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="phone" name="nomor_hp" type="tel" placeholder="NOMOR HP *" required />
                                    <div class="invalid-feedback">Mohon isi nomor HP.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" id="message" name="pesan" placeholder="Pesan *" required rows="6"></textarea>
                                    <div class="invalid-feedback">Mohon isi pesan.</div>
                         <div class="text-center mt-4">
                            <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Kirim</button>
                        </div>
                        <!-- NOTIFIKASI PESAN -->
                        <div class="d-none" id="submitSuccessMessage">
                            <script>
                            Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                            }).then((result) => {if (result.value)
                                {window.location = 'http://localhost/kas_masjid/';}
                            })</script>"
                            </div>
                        </div>
                        <!-- Submit error message -->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .contact-background {
        background-image: url('assets/map-image.png');
        background-size: cover;
        background-position: center;
        padding: 100px 0; /* Adjust as needed */
    }

    /* Adjust form layout */
    #contactForm .form-group {
        margin-bottom: 20px;
    }
</style>

</style>
<!-- Submit Button -->
               </section>
        <!-- Footer-->
        </footer>
        <!-- Portfolio Modals-->
</html>