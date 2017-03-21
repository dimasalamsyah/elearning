<?php 

include '../koneksi.php';

$pelajaran = trim(@$_POST['pelajaran']) ?: 'null';
$pertanyaan = trim(@$_POST['pertanyaan']) ?: 'null';
$keterangan = trim(@$_POST['keterangan']) ?: 'null';
$jawaban = trim(@$_POST['jawaban']) ?: 'null';

//$fileGambar = trim(@$_POST['fileGambar']) ?: 'null';
$fileGambar = $_FILES['fileGambar']['name'] ?: 'null';
$tipe_file = $_FILES['fileGambar']['type'] ?: 'null';
$tmp_file = $_FILES['fileGambar']['tmp_name'] ?: 'null';
$path = "../images/".$fileGambar;

$A = trim(@$_POST['A']) ?: 'null';
$B = trim(@$_POST['B']) ?: 'null';
$C = trim(@$_POST['C']) ?: 'null';
$D = trim(@$_POST['D']) ?: 'null';

$sql = "INSERT INTO quiz (kategori, pertanyaan, soal_A, soal_B, soal_C, soal_D, jawaban, keterangan, gambar) values ( '$pelajaran', '$pertanyaan', '$A', '$B', '$C', '$D', '$jawaban', '$keterangan', '$fileGambar' )";

//echo $fileGambar;

if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ 

	if(move_uploaded_file($tmp_file, $path)){
//		echo $sql;
		$q = mysqli_query($conn, $sql);
		if($q){
			header("location: soal.php");
		}
	}

}






?>