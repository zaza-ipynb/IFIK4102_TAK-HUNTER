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


if(!empty($_POST['nama']) && !empty($_POST['dates']) && !empty($_POST['jenis']) && !empty($_POST['harga']) && !empty($_POST['jpanitia']) && !empty($_POST['jpeserta']) && !empty($_POST['deskripsi'])):
    $sql = "INSERT INTO events (NamaEvent, JenisEvent, JumlahPanitia, JumlahPeserta, Deskripsi, Dates, IdPenyelenggara, HargaTiket) VALUES (:nama, :jenis, :jpanitia, :jpeserta, :deskripsi, :dates, :idpenyelenggara, :harga)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':nama', $_POST['nama']);
    $stmt->bindParam(':jenis', $_POST['jenis']);
    $stmt->bindParam(':jpanitia', $_POST['jpanitia']);
    $stmt->bindParam(':jpeserta', $_POST['jpeserta']);
    $stmt->bindParam(':deskripsi', $_POST['deskripsi']);
    $stmt->bindParam(':harga', $_POST['harga']);
    $stmt->bindParam(':dates', $_POST['dates']);
    $stmt->bindParam(':idpenyelenggara', $user['UserId']);

    if( $stmt->execute() ):
        header("Location:Home(EO).php");
    else:
        header("Location:TambahEvent(EO).php");
    endif;
endif;

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tambah Event</title>
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
                <div class="col-md-9" style="background-color: rgba(245,241,216,0.77);">
                    <form action ="TambahEvent(EO).php" method="POST">
                        <h1 class="text-center">Tambah Event</h1>
                        <p class="text-left" style="color: #000000;">Nama Event<br>
                            <input class="form-control" type="text" name="nama" style="width: 820px;">
                        <br>Tanggal Event<br>
                            <input class="form-control" type="date" name="dates" style="width: 410px;">
                        <br>Jenis Event<br>
                            <div class="radio">
                              <label><input type="radio" name="jenis" value="Workshop" checked>&nbsp;Workshop</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="jenis" value="Conference">&nbsp;Conference</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="jenis" value="Festival">&nbsp;Festival</label>
                            </div>
                        <br>Harga Tiket<br>
                            <input class="form-control" type="number" name="harga" style="width: 410px;">
                        <br>Jumlah Panitia<br>
                            <input class="form-control" type="number" name="jpanitia" style="width: 410px;">
                        <br>Jumlah Peserta<br>
                            <input class="form-control" type="number" name="jpeserta" style="width: 410px;">
                        <br>Deskripsi Event<br>
                            <textarea class="form-control" name="deskripsi" style="width: 820px;height: 180px;" ></textarea>
                        <!-- <br>Input Poster<br><input type="file"><br> --></p>
                        <p class="text-center">
                            <button class="btn btn-primary text-center" type="submit" style="background-color: #f4476b;">Tambah Event</button>
                        </p>
                    </form>
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