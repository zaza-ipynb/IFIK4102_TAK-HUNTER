<?php

session_start();

if( isset($_SESSION['userid']) ){
    header("Location: /");
}

require 'koneksi.php';

if(!empty($_POST['nim']) && !empty($_POST['password'])):
    
    $records = $conn->prepare('SELECT UserId, NIM, Password FROM users WHERE nim = :nim');
    $records->bindParam(':nim', $_POST['nim']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if(count($results) > 0 && password_verify($_POST['password'], $results['Password']) ){

        $_SESSION['userid'] = $results['UserId'];
        header("Location:Home(Peserta).php");

    } else {
        $message = 'Sorry, those credentials do not match';
    }

endif;

?>
<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>IMPAL</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
</head>

<body style="background-color: rgb(255,255,255);">
    <nav class="navbar navbar-light navbar-expand-md navbar navbar-expand-lg fixed-top" id="mainNav" style="background-color: #ffffff;">
        <div class="container"><a class="navbar-brand js-scroll-trigger" href="Home(Belum%20Login).html" style="color: #f4476b;"><strong>&nbsp;TAK</strong><i class="fas fa-eye" style="font-size: 22px;"></i><strong>Hunter</strong><br></a><button data-toggle="collapse" class="navbar-toggler navbar-toggler-right"
                data-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" value="Menu"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="SignIn.php" style="background-color: rgba(181,126,126,0);">Sign In</a></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="btn btn-light action-button" role="button" href="SignUp.php" style="background-color: #f4476b;border-radius: 20px;color: #f0f9ff;">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="login-clean" style="background-color: #66d7d7;padding-bottom: 60px;">
        <form action ="SignIn.php" class="text-center" data-aos="fade" method="POST" style="margin-top: 75px;margin-bottom: 20px;">
            <h1 class="text-center" style="font-size: 30px;margin-bottom: 30px;"><span style="text-decoration: underline;">SIGN IN</span></h1>
            <div class="form-group"><input class="form-control" type="nim" name="nim" placeholder="NIM"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div><a class="forgot" href="#">Forgot your nim or password?</a>
            <p><span style="text-decoration: underline;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p>
            <p style="font-size: 15px;">Or Sign In With</p><i class="fab fa-facebook-f" style="margin-right: 10px;color: #f4476b;font-size: 20px;"></i><i class="fab fa-google-plus-g" style="margin-left: 10px;color: #f4476b;font-size: 20px;"></i></form>
    </div>
    <div class="footer-dark" style="padding-top: 0px;padding-bottom: 24px;">
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