<?php 
include '../koneksi.php';
include 'header.php';

/*hitung jawaban benar*/
$pelajaran = @$_GET['pelajaran'];
$users = $_SESSION['id'];

$q = "SELECT a.* from jwb_quiz a where id_user='$users' and pelajaran='$pelajaran' and a.jawaban = (SELECT jawaban_benar from jwb_quiz where id=a.id) ";
$sql = mysqli_query($conn, $q);
$num = mysqli_num_rows($sql);

$q1 = "SELECT * FROM quiz where kategori='$pelajaran'  ";
$sql1 = mysqli_query($conn, $q1);
$num1 = mysqli_num_rows($sql1);

$salah = $num1 - $num;


?>

<div class="col-xs-12 col-sm-9 col-sm-push-3">

	<div class="jumbotron" style="height: auto;">
	  <center><h3>SCORE</h3></center>
	  <p>

	  		Benar : <?=$num?> <br>
	  		Salah :	<?=$salah?>

	  </p>
	  <a href="quiz_result.php?pelajaran=<?=$pelajaran?>" class="btn btn-warning btn-lg">Lihat Jawaban Kamu</a>
	  <a href="quiz_penjelasan.php?pelajaran=<?=$pelajaran?>" class="btn btn-success btn-lg">Penjelasan</a>
	</div>

</div>

<div class="col-xs-6 col-sm-3 col-sm-pull-9 sidebar-offcanvas" id="sidebar">
  <div class="list-group">
    <?php include 'side_bar.php'; ?>
  </div>
</div>

<?php include 'footer.php';?>