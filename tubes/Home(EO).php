<?php

session_start();

require 'koneksi.php';

if( isset($_SESSION['userid']) ){

    $records = $conn->prepare('SELECT UserId, NIM, Password, Email, FullName FROM users WHERE UserId = :id');
    $records->bindParam(':id', $_SESSION['userid']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = NULL;

    if( count($results) > 0){
        $user = $results;
    }
}
    
    $er1 = $conn->prepare('SELECT * FROM events WHERE IdPenyelenggara = :id ORDER BY Dates LIMIT 0, 1');
    $er1->bindParam(':id', $_SESSION['userid']);
    $er1->execute();
    $r1 = $er1->fetch(PDO::FETCH_ASSOC);
    $e1 = NULL;
    if( count($r1) > 0){
        $e1 = $r1;
    }

    $er2 = $conn->prepare('SELECT * FROM events WHERE IdPenyelenggara = :id ORDER BY Dates LIMIT 1, 1');
    $er2->bindParam(':id', $_SESSION['userid']);
    $er2->execute();
    $r2 = $er2->fetch(PDO::FETCH_ASSOC);
    $e2 = NULL;
    if( count($r2) > 0){
        $e2 = $r2;
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Event Organizer</title>
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
        <div class="container"><a class="navbar-brand js-scroll-trigger" href="Home(Peserta).php" style="color: #f4476b;"><strong>&nbsp;TAK</strong><i class="fas fa-eye" style="font-size: 22px;"></i><strong>Hunter</strong><br></a><button data-toggle="collapse" class="navbar-toggler navbar-toggler-right"
                data-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" value="Menu"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="background-color: #f4476b;border-radius: 20px;margin-top: 5px;margin-bottom: 5px;color: #ffffff;">&nbsp;Event Organizer&nbsp;</a>
                        <div
                            class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="Home(Peserta).php">Peserta</a><a class="dropdown-item" role="presentation" href="Home(EO).php">Event Organizer</a></div>
            </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item" role="presentation"><a class="nav-link" href="Profil.php"><i class="fas fa-user" style="font-size: 30px;color: #000000;"></i></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt" style="color: #000000;font-size: 32px;"></i></a></li>
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
                            <li><a href="\tubes\Countdown(Peserta).php?id=<?= $e1['idEvent']; ?>">Detail Event</a></li>
                            <li><a href="\tubes\UpdateEvent(EO).php?id=<?= $e1['idEvent']; ?>">Update Event</a></li>
                            <li><a href="\tubes\HapusEvent(EO).php?id=<?= $e1['idEvent']; ?>">Hapus Event</a></li>
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
                            <li><a href="Laporan%20Penjualan(EO).html">Laporan Penjualan</a></li>
                            <li><a href="Data%20Pemesanan(EO).html">Data Pemesanan</a></li>
                            <li><a href="\tubes\Countdown(Peserta).php?id=<?= $e2['idEvent']; ?>">Detail Event</a></li>
                            <li><a href="\tubes\UpdateEvent(EO).php?id=<?= $e2['idEvent']; ?>">Update Event</a></li>
                            <li><a href="\tubes\HapusEvent(EO).php?id=<?= $e2['idEvent']; ?>">Hapus Event</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div></div>
                <div class="col-md-9">
                    <div class="jumbotron" style="background-image: url(&quot;assets/img/2.jpg&quot;);background-size: cover;background-position: center;">
                        <div class="col-md-8 offset-sm-0 offset-md-2 text-center" style="margin-top: 100px;margin-bottom: 100px;background-color: rgba(244,71,107,0.53);">
                            <h1 style="color: rgb(255,255,255);">Halaman Event Oganizer&nbsp;<br><br></h1>
                            <hr style="border-top:1px;color:rgba(255,255,255,0.9);width:60%;margin:0px;margin-top:-50px;margin-bottom:10px;margin-left:20%;">
                            <p style="color: rgb(255,255,255);">Jadilah yang pertama menjadi event organizer di website kami, anda dapat menambah event, menghapus event<br></p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-dark" style="padding-top: 0px;padding-bottom: 24px;margin-top: 120px;">
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