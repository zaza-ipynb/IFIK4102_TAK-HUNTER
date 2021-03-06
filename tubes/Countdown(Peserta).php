<?php

session_start();

require 'koneksi.php';

$id = $_GET['id'];


$er = $conn->prepare('SELECT * FROM events WHERE idEvent = :id');
$er->bindParam(':id', $_GET['id']);
$er->execute();
$r = $er->fetch(PDO::FETCH_ASSOC);
$e = NULL;
if( count($r) > 0){
    $e = $r;
}

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

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Daftar Event</title>
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
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="background-color: #f4476b;border-radius: 20px;margin-top: 5px;margin-bottom: 5px;color: #ffffff;">&nbsp;Peserta&nbsp;</a>
                        <div class="dropdown-menu"
                            role="menu"><a class="dropdown-item" role="presentation" href="Home(Peserta).php">Peserta</a><a class="dropdown-item" role="presentation" href="Home(EO).php">Event Organizer</a></div>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="Profil.html">&nbsp;<i class="fas fa-user-alt" style="font-size: 30px;"></i></a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#"><i class="fas fa-sign-out-alt" style="font-size: 32px;color: #000000;"></i></a></li>
            </ul>
        </div>
    </nav>
    <section class="py-5 bg-info text-white" style="margin-top: 97px;">
        <div class="container text-center boxed-countdown" data-countdown="11/27/2020 02:51:00">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1>COUNTDOWN</h1>
                </div>
                <div class="col-6 col-md-3 mt-3">
                    <p class="number-days m-0 rounded-top" style="color: rgb(255,255,255);">00</p>
                    <p class="text-countdown rounded-bottom" style="color: rgb(255,255,255);">days</p>
                </div>
                <div class="col-6 col-md-3 mt-3">
                    <p class="number-hours m-0 rounded-top" style="color: rgb(255,255,255);">00</p>
                    <p class="text-countdown rounded-bottom" style="color: rgb(255,255,255);">hours</p>
                </div>
                <div class="col-6 col-md-3 mt-3">
                    <p class="number-minutes m-0 rounded-top" style="color: rgb(255,255,255);">00</p>
                    <p class="text-countdown rounded-bottom" style="color: rgb(255,255,255);">minutes</p>
                </div>
                <div class="col-6 col-md-3 mt-3">
                    <p class="number-seconds m-0 rounded-top" style="color: rgb(255,255,255);">00</p>
                    <p class="text-countdown rounded-bottom" style="color: rgb(255,255,255);">seconds</p>
                </div>
            </div>
        </div>
    </section>
    <div class="projects-horizontal">
        <div class="container">
            <div class="intro"></div>
            <div class="row projects" style="background-color: #f5f1d8;">
                <div class="col-sm-12 item">
                    <div class="row">
                        <div class="col-md-12 col-lg-5"><img class="img-fluid" src="assets/img/6.jpg"></div>
                        <div class="col">
                            <h3 class="name" style="font-size: 50px;">
                            <?= $e['NamaEvent']; ?>
                            </h3>
                            <h3 class="name" style="font-size: 25px;">
                            <?= $e['JenisEvent']; ?>
                            </h3>
                            <p class="description">
                            <?= $e['Deskripsi']; ?>
                            <br></p>
                            <h3 class="name" style="font-size: 20px;">Tanggal</h3>
                            <h3 class="name" style="font-size: 17px;"><?= $e['Dates']; ?></h3>
                            <h3 class="name" style="font-size: 20px;">Harga Tiket</h3>
                            <h3 class="name" style="font-size: 17px;">Rp. <?= $e['HargaTiket']; ?>,-</h3>
                            <h3 class="name" style="font-size: 20px;">Batas Peserta</h3>
                            <h3 class="name" style="font-size: 17px;"><?= $e['JumlahPeserta']; ?> Orang</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="features-boxed">
        <div class="container">
            <div class="row justify-content-center features" style="background-color: #ed6f89;">
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fas fa-address-card icon"></i>
                        <h3 class="name">Mahasiswa</h3>
                        <p class="description">Rp. <?= $e['HargaTiket']; ?>,-</p><a class="btn btn-primary" role="button" href="Pembayaran(Peserta).html">Beli</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fas fa-chalkboard-teacher icon"></i>
                        <h3 class="name">Lainnya</h3>
                        <p class="description">
                            Rp. <?= $e['HargaTiket']+25000; ?>,-
                        </p><a class="btn btn-primary" role="button" href="Pembayaran(Peserta).html">Beli</a></div>
                </div><!--*-*-*-*-*-*-*-*-*-*- BOOTSTRAP CAROUSEL *-*-*-*-*-*-*-*-*-*-->

		<div id="range_slides_4_columns_carousel" class="carousel slide range_slides_carousel_wrapper swipe_x ps_easeOutCirc" data-ride="carousel" data-duration="2000" data-interval="5000" data-pause="hover">

			<!--========= Indicators =========-->
			<ol class="carousel-indicators range_slides_carousel_indicators">
				<li data-target="#range_slides_4_columns_carousel" data-slide-to="0" class="active"></li>
				<li data-target="#range_slides_4_columns_carousel" data-slide-to="1"></li>
			</ol>

			<!--========= Wrapper for slides =========-->
			<div class="carousel-inner range_slides_carousel_inner" role="listbox">

				<!--========= First slide =========-->
				<div class="carousel-item active">
					<div class="row">
						<div class="col-3 col-sm-3 col-md-3 range_slides_item_image">
							<a href="#"><img src="assets/img/6.jpg" alt="slider 01"></a>
						</div>
						<div class="col-3 col-sm-3 col-md-3 range_slides_item_image">
							<a href="#"><img src="assets/img/6.jpg" alt="slider 02"></a>
						</div>
						<div class="col-3 col-sm-3 col-md-3 range_slides_item_image">
							<a href="#"><img src="assets/img/6.jpg" alt="slider 03"></a>
						</div>
						<div class="col-3 col-sm-3 col-md-3 range_slides_item_image">
							<a href="#"><img src="assets/img/6.jpg" alt="slider 04"></a>
						</div>
					</div>
				</div>

				<!--========= Second Slide =========-->
				<div class="carousel-item">
					<div class="row">
						<div class="col-3 col-sm-3 col-md-3 range_slides_item_image">
							<a href="#"><img src="assets/img/6.jpg" alt="slider 05"></a>
						</div>
						<div class="col-3 col-sm-3 col-md-3 range_slides_item_image">
							<a href="#"><img src="assets/img/6.jpg" alt="slider 06"></a>
						</div>
						<div class="col-3 col-sm-3 col-md-3 range_slides_item_image">
							<a href="#"><img src="assets/img/6.jpg" alt="slider 07"></a>
						</div>
						<div class="col-3 col-sm-3 col-md-3 range_slides_item_image">
							<a href="#"><img src="assets/img/6.jpg" alt="slider 08"></a>
						</div>
					</div>
				</div>
				
				<!--======= Navigation Buttons =========-->

				<!--======= Left Button =========-->
				<a class="carousel-control-prev range_slides_carousel_control_left" href="#range_slides_4_columns_carousel" data-slide="prev">
					<span class="fa fa-chevron-left range_slides_carousel_control_icons" aria-hidden="true"></span>
				</a>

				<!--======= Right Button =========-->
				<a class="carousel-control-next range_slides_carousel_control_right" href="#range_slides_4_columns_carousel" data-slide="next">
					<span class="fa fa-chevron-right range_slides_carousel_control_icons" aria-hidden="true"></span>
				</a>

			</div>

		</div> <!--*-*-*-*-*-*-*-*-*-*- END BOOTSTRAP CAROUSEL *-*-*-*-*-*-*-*-*-*-->


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