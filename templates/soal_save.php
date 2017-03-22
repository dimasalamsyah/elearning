<?php 

include '../koneksi.php';

$id = trim(@$_POST['id']) ?: 'null';

$pelajaran = trim(@$_POST['pelajaran']) ?: 'null';
$pertanyaan = trim(@$_POST['pertanyaan']) ?: 'null';
$keterangan = trim(@$_POST['keterangan']) ?: 'null';
$jawaban = trim(@$_POST['jawaban']) ?: 'null';

$A = trim(@$_POST['A']) ?: 'null';
$B = trim(@$_POST['B']) ?: 'null';
$C = trim(@$_POST['C']) ?: 'null';
$D = trim(@$_POST['D']) ?: 'null';

/*cek ketika edit*/
if($id == 'null'){

	$fileGambar = $_FILES['fileGambar']['name'] ?: 'null';
	$tipe_file = $_FILES['fileGambar']['type'] ?: 'null';
	$tmp_file = $_FILES['fileGambar']['tmp_name'] ?: 'null';
	$path = "../images/".$fileGambar;

	$sql = "INSERT INTO quiz (kategori, pertanyaan, soal_A, soal_B, soal_C, soal_D, jawaban, keterangan, gambar) values ( '$pelajaran', '$pertanyaan', '$A', '$B', '$C', '$D', '$jawaban', '$keterangan', '$fileGambar' )";

	//echo $fileGambar;

	if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ 

		if(move_uploaded_file($tmp_file, $path)){

			$q = mysqli_query($conn, $sql);
			if($q){
				header("location: soal.php");
			}
		}

	}

}else{

	$sql = "UPDATE quiz set kategori='$pelajaran', pertanyaan='$pertanyaan', soal_A='$A', soal_B='$B', soal_C='$C', soal_D='$D', jawaban='$jawaban', keterangan='$keterangan' where id='$id' ";
	$query = mysqli_query($conn, $sql);

	if($sql){
		header("location: soal_data.php?pelajaran=".$pelajaran);
		//echo $sql;
	}

}








?>