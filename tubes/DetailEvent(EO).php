<?php

session_start();

require 'koneksi.php';
//getting id from url
$id = $_GET['id'];

    $er = $conn->prepare('SELECT * FROM events WHERE idEvent=$id');
    $er->bindParam(':id', $_SESSION['userid']);
    $er->execute();
    $r = $er->fetch(PDO::FETCH_ASSOC);
    $e = NULL;
    if( count($r) > 0){
        $e = $r;
    }   

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Detail Event</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
</head>

<body style="background-color: #66d7d7;">
    <nav class="navbar navbar-light navbar-expand-md navbar navbar-expand-lg fixed-top" id="mainNav" style="background-color: #ffffff;">
        <div class="container"><a class="navbar-brand js-scroll-trigger" href="Home(Peserta).html" style="color: #f4476b;"><strong>&nbsp;TAK</strong><i class="fas fa-eye" style="font-size: 22px;"></i><strong>Hunter</strong><br></a><button data-toggle="collapse" class="navbar-toggler navbar-toggler-right"
                data-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" value="Menu"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="background-color: #f4476b;border-radius: 20px;margin-top: 5px;margin-bottom: 5px;color: #ffffff;">&nbsp;Event Organizer&nbsp;</a>
                        <div
                            class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="Home(Peserta).html">Peserta</a><a class="dropdown-item" role="presentation" href="Home(EO).html">Event Organizer</a></div>
            </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item" role="presentation"><a class="nav-link" href="Profil.html"><i class="fas fa-user" style="font-size: 30px;color: #000000;"></i></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#"><i class="fas fa-sign-out-alt" style="color: #000000;font-size: 32px;"></i></a></li>
            </ul>
        </div>
        </div>
    </nav>
    <div style="margin-top: 95px;">
        <div class="container">
            <div class="row">
                <div class="col-md-3"><div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Event Organizer</h3>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="Home(EO).php">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            Home
                        </a>
                        <a href="TambahEvent(EO).php">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            Tambah Event
                        </a>
                        <a href="#pageSubmenuEvent1" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            <?php if( !empty($e1) ): ?>
                                <?= $e1['NamaEvent']; ?>
                            <?php else: ?>
                                Event1(kosong)
                            <?php endif; ?>
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenuEvent1">
                            <li><a href="Laporan%20Penjualan(EO).html">Laporan Penjualan</a></li>
                            <li><a href="Data%20Pemesanan(EO).html">Data Pemesanan</a></li>
                            <li><a href="\tubes\DetailEvent(EO).php?id=<?= $e1['idEvent']; ?>">Detail Event & Hapus Event</a></li>
                        </ul>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            <?php if( !empty($e2) ): ?>
                                <?= $e2['NamaEvent']; ?>
                            <?php else: ?>
                                Event2(kosong)
                            <?php endif; ?>
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="Laporan%20Penjualan(EO).html">Laporan Penjualan </a></li>
                            <li><a href="Data%20Pemesanan(EO).html">Data Pemesanan</a></li>
                            <li><a href="\tubes\DetailEvent(EO).php?id=<?= $e2['idEvent']; ?>">Detail Event & Hapus Event</a></li>
                        </ul>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            <?php if( !empty($e3) ): ?>
                                <?= $e3['NamaEvent']; ?>
                            <?php else: ?>
                                Event3(kosong)
                            <?php endif; ?>
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu1">
                            <li><a href="Laporan%20Penjualan(EO).html">Laporan Penjualan </a></li>
                            <li><a href="Data%20Pemesanan(EO).html">Data Pemesanan</a></li>
                            <li><a href="\tubes\DetailEvent(EO).php?id=<?= $e3['idEvent']; ?>">Detail Event & Hapus Event</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div></div>
                <div class="col-md-9" style="background-color: rgba(245,241,216,0.77);">
                    <h1 class="text-center">Detail Event &amp; Hapus Event</h1><img class="img-fluid" src="assets/img/6.jpg">
                    <h1 class="text-center" style="font-size: 25px;margin-top: 10px;"><strong>Nama Event</strong></h1>
                    <ul>
                        <li><strong>Deskripsi :</strong><br>Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida.<br></li>
                        <li><strong>Tanggal :</strong><br>12 Desember 2019</li>
                        <li><strong>Waktu :</strong><br>12.00 - 15.00</li>
                        <li><strong>Tempat :</strong><br>Gedung Serba Guna Telkom University</li>
                    </ul>
                    <p class="text-center"><button class="btn btn-primary text-center" type="button" style="background-color: #f4476b;">Hapus Event</button></p>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-dark" style="padding-top: 0px;padding-bottom: 24px;margin-top: 30px;">
        <footer>
            <div class="container">
                <p class="copyright"><strong>Copyright @ 2019. All Right Reserved. TAK Hunter is a registered treademark</strong><br></p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>