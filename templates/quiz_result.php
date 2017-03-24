<?php 
include '../koneksi.php';
include 'header.php';

$pelajaran = @$_GET['pelajaran'];
$users = $_SESSION['id'];

?>


<div class="col-xs-12 col-sm-9 col-sm-push-3">

<h1>Hasil jawaban <?=$pelajaran?>:</h1>

<?php

$q = "SELECT b.pertanyaan, a.jawaban_benar, a.jawaban, (CASE WHEN a.jawaban='A' THEN b.soal_A WHEN a.jawaban='B' THEN b.soal_B WHEN a.jawaban='C' THEN b.soal_C ELSE b.soal_D END) as jwb_pil FROM jwb_quiz a
	left join quiz b on b.id = a.id_soal
	where a.id_user='$users' and a.pelajaran='$pelajaran' order by b.id asc";

$sql = mysqli_query($conn, $q);
$no=1;
while ($row = mysqli_fetch_array($sql)) {

	if( trim($row['jawaban']) == trim($row['jawaban_benar']) ){
		$ket = "<span style='color: green'>Benar</span>";
	}else{
		$ket = "<span style='color: red'>Salah</span>";
	}

	?>

	<span><b style="font-size: 16px"><?=$no.".".$row['pertanyaan']?></b></span><br>
	<div style="margin-left: 12px;">
		<span><?=$row['jawaban'].".".$row['jwb_pil']?></span> <br>
		<?=$ket?>
	</div>
	
	<br>
	<?php

	$no++;
}

?>


<!-- komentar -->
<p>Tulis komentar disini</p>
<form>
	<div class="form-group">
		<textarea class="form-control" rows="3" style="width: 500px;"></textarea>
	</div>
	<div class="form-group">
		<button class="btn btn-default">Submit</button>
	</div>
</form>


</div>

<div class="col-xs-6 col-sm-3 col-sm-pull-9 sidebar-offcanvas" id="sidebar">
  <div class="list-group">
    <?php include 'side_bar.php'; ?>
  </div>
</div>

<?php include 'footer.php';?>