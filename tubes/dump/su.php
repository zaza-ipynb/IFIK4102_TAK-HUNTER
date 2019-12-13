<?php
	include 'SignUp.php';
	include 'koneksi.php';
	// menyimpan data kedalam variabel
	$full_name   	= $_POST['nama'];
	$nim			= $_POST['nim'];
	$email        	= $_POST['email'];
	$password 	  	= $_POST['password'];
	// query SQL untuk insert data
	$query = "INSERT INTO users SET FullName='$full_name', NIM='$nim', Email='$email', Password='$password'";

	
	$user = mysqli_query($conn,"SELECT * FROM users WHERE NIM='$nim'");
	$chek = mysqli_num_rows($user);
	if($chek>0)
	{
    	header("location:Home(Peserta).php");
    	exit();
	}else
	{
		if (mysqli_query($conn, $query)) {
    		echo "New record created successfully";
		} else {	
    		echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}

		mysqli_close($conn);
		// mengalihkan ke halaman index.php
		header("location:SignIn.php");
		exit();
	}
?>