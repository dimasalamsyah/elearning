<?php 
include '../koneksi.php';
$id = trim(@$_GET['id']);
$pelajaran = trim(@$_GET['pelajaran']);

$sql = mysqli_query($conn, "DELETE from quiz where id='$id' ");

if($sql){
	header("location: soal_data.php?pelajaran=".$pelajaran);
}

?>