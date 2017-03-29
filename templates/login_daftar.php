<?php 
session_start();

//include 'header.php';
include '../koneksi.php';

$usernameDaf = trim($_POST['usernameDaf']);
$email = trim($_POST['email']);
$passwordDaf = trim($_POST['passwordDaf']);
$confirmPassword = trim($_POST['confirmPassword']);


$q = "INSERT INTO users (nis, nama, pass, level) values ('$usernameDaf', '$email', '$passwordDaf', 'user')";
$sql = mysqli_query($conn, $q);

if($sql){
	$_SESSION['id'] = $usernameDaf;
	$_SESSION['nama'] = $email;
	$_SESSION['pic'] = $link1.'images/users.png';

	//http://graph.facebook.com/<?=$_SESSION['id']/picture
	
	//header($link);
	//include 'header.php';
	header('location: '.$link1);
	//echo $q;
}

?>