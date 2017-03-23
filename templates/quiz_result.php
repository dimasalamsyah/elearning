<?php 
include '../koneksi.php';
include 'header.php';

$pelajaran = @$_GET['pelajaran'];
$users = $_SESSION['id'];

?>


<div class="col-xs-12 col-sm-9 col-sm-push-3">

<h1>Hasil jawaban:</h1>

<?php

$q = "SELECT b.pertanyaan, a.jawaban, (CASE WHEN a.jawaban='A' THEN b.soal_A WHEN a.jawaban='B' THEN b.soal_B WHEN a.jawaban='C' THEN b.soal_C ELSE b.soal_D END) as soal FROM jwb_quiz a
	left join quiz b on b.id = a.id_soal
	where a.id_user='$users' and a.pelajaran='$pelajaran' order by b.id asc";

$sql = mysqli_query($conn, $q);
$no=1;
while ($row = mysqli_fetch_array($sql)) {
	?>

	<span><b><?=$no.".".$row['pertanyaan']?></b></span><br>
	<span><?=$row['jawaban'].".".$row['soal']?></span>
	<br>
	<?php

	$no++;
}

?>




</div>

<div class="col-xs-6 col-sm-3 col-sm-pull-9 sidebar-offcanvas" id="sidebar">
  <div class="list-group">
    <?php include 'side_bar.php'; ?>
  </div>
</div>

<?php include 'footer.php';?>