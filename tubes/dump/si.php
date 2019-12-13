<?php
	include 'SignIn.php';
	include 'koneksi.php';
	// menyimpan data kedalam variabel
	$email        = $_POST['email'];
	$password 	  = $_POST['password'];
	// query SQL untuk insert data
	
	$user = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'");
	$chek = mysqli_num_rows($user);
	if($chek>0)
	{
    	if (mysqli_query($conn, $query)) {
    		echo "New record created successfully";
		} else {
    		echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
		// mengalihkan ke halaman index.php
		header("location:Home(Peserta).php");
	}else
	{
		header("location:Home(Peserta).php");
	}
?>