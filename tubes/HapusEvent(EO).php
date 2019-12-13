<?php
//including the database connection file
session_start();	
include("koneksi.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$query = $conn->prepare('DELETE FROM events WHERE idEvent= :id');
$query->bindParam(':id', $_GET['id']);
$query->execute();

//redirecting to the display page (index.php in our case)
header("Location:Home(EO).php");
?>

