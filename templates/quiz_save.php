<?php 
session_start();

$users = $_SESSION['id'];
$id_soal = trim($_POST['idQuiz']);
$jawaban = trim($_POST['jawaban']);
$pelajaran = trim($_POST['pelajaran']);

include '../koneksi.php';

/*cek soal sudah di jawab blm*/
$q_cek = "SELECT * FROM jwb_quiz where id_soal='$id_soal' and id_user='$users' ";
$sql_cek = mysqli_query($conn, $q_cek);
$num = mysqli_num_rows($sql_cek);


/*cek jawaban*/
$q_jwb = "SELECT * FROM quiz where id='$id_soal' ";
$sql_jwb = mysqli_query($conn, $q_jwb);
$row_jwb = mysqli_fetch_array($sql_jwb);
$jawabanBenar = trim($row_jwb['jawaban']);


if($num == 0){

	$q = "INSERT INTO jwb_quiz(id_user, id_soal, jawaban, jawaban_benar, pelajaran ) values ( '$users', '$id_soal', '$jawaban', '$jawabanBenar', '$pelajaran' )";
	$sql = mysqli_query($conn, $q);

	if($sql){
		//echo "succses";
		echo $q;
	}


}else{


	$q = "UPDATE jwb_quiz set jawaban='$jawaban' where id_soal='$id_soal' ";
	$sql = mysqli_query($conn, $q);

	if($sql){
		//echo $q;
		echo "succses update";
	}

}


 ?>