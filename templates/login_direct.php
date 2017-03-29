<?php 
session_start();

//include 'header.php';
include '../koneksi.php';



$username = trim($_POST['username']);
$password = trim($_POST['password']);


$q = "SELECT nama, nis, level FROM users where nis='$username' and pass='$password' ";
$sql = mysqli_query($conn, $q);
$row = mysqli_fetch_array($sql);
$nama = trim($row['nama']);
$nis = trim($row['nis']);
$count = mysqli_num_rows($sql);

if($count != 0){
	$_SESSION['nama'] = $nama;
	$_SESSION['id'] = $nis;
	$_SESSION['pic'] = $link1.'images/users.png';	

	header('location: '.$link1);
}else{
	header('location:'.$link1.'login.php?error=1');
	//$q;
}


?>