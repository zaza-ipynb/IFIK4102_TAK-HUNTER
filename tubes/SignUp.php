<?php

session_start();

if( isset($_SESSION['userid']) ){
    header("Location: /");
}

require 'koneksi.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['nama']) && !empty($_POST['nim'])):
    
    // Enter the new user in the database
    $sql = "INSERT INTO users (Email, Password, FullName, NIM) VALUES (:email, :password, :nama, :nim)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':nama', $_POST['nama']);
    $stmt->bindParam(':nim', $_POST['nim']);
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $pass);

    if( $stmt->execute() ):
        $message = 'Successfully created new user';
    else:
        $message = 'Sorry there must have been an issue creating your account';
    endif;

endif;

?>

<!DOCTYPE html>
<html>

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

<body style="background-color: #66d7d7;">
    <nav class="navbar navbar-light navbar-expand-md navbar navbar-expand-lg fixed-top" id="mainNav" style="background-color: #ffffff;">
        <div class="container"><a class="navbar-brand js-scroll-trigger" href="Home(Belum%20Login).html" style="color: #f4476b;"><strong>&nbsp;TAK</strong><i class="fas fa-eye" style="font-size: 22px;"></i><strong>Hunter</strong><br></a><button data-toggle="collapse" class="navbar-toggler navbar-toggler-right"
                data-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" value="Menu"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="Sign%20In.html" style="background-color: rgba(181,126,126,0);">Sign In</a></li>
                    <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="btn btn-light action-button" role="button" href="Sign%20Up.html" style="background-color: #f4476b;border-radius: 20px;color: #f0f9ff;">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="login-clean" style="background-color: #66d7d7;padding-bottom: 60px;">
        <form action ="SignUp.php" class="text-center" data-aos="fade" method="POST" style="margin-top: 75px;margin-bottom: 20px;">
            <h1 class="text-center" style="font-size: 30px;margin-bottom: 30px;"><span style="text-decoration: underline;">SIGN UP</span></h1>
            <input class="form-control" type="text" name="nama" placeholder="Full Name" style="margin-bottom: 14px;"><input class="form-control" type="text" name="nim" placeholder="NIM" style="margin-bottom: 14px;">
            <div class="form-group"><input class="form-control" type="text" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><input class="form-control" type="password" name="password_repeat" placeholder="Password (Ulangi)"></div><div class="form-group"><button class="btn btn-primary btn-block" type="submit">Sign Up</button></div>
            <a class="forgot" href="SignIn.php">You already have an account? Login here</a>
            <?php if(!empty($message)): ?>
                <p><?= $message ?></p>
            <?php endif; ?>
        </form>
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