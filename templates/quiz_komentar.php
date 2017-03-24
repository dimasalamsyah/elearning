<?php 
session_start();
include '../koneksi.php';
$users = $_SESSION['id'];
$komentar = trim(@$_POST['komentar']);
$pelajaran = trim(@$_POST['pelajaran']);

$sql = mysqli_query($conn, "INSERT INTO komentar (id_user, komentar, pelajaran) values ('$users', '$komentar', '$pelajaran' )");

if($sql){
	echo "succses";
}

?>