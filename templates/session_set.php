<?php
session_start();

$_SESSION['id'] = trim(@$_POST['id']);
$_SESSION['nama'] = trim(@$_POST['nama']);
$_SESSION['pic'] = "http://graph.facebook.com/".$_SESSION['id']."/picture";

$usernameDaf = $_SESSION['id'];
$email = $_SESSION['nama'];
$passwordDaf = '';

if($_SESSION['id'] != ''){
	echo $_SESSION['id'];
}

include '../koneksi.php';
$q = "INSERT INTO users (nis, nama, pass, level) values ('$usernameDaf', '$email', '$passwordDaf', 'userFB')";
$sql = mysqli_query($conn, $q);

?>