<?php 
include 'header.php'; 
include '../koneksi.php';

$pelajaran = trim(@$_GET['pelajaran']);
$q = "SELECT * from quiz where kategori='$pelajaran' order by id asc";
$sql = mysqli_query($conn, $q);
$no=1;

echo '<div class="col-xs-12 col-sm-9 col-sm-push-3">';

while ($row = mysqli_fetch_array($sql)) {
		
	?>

	<div class="jumbotron" style="height: auto;">
	  <h4><span style="margin-right: 15px;"><?=$no?>.</span><span><?=$row['pertanyaan']?></span></h4>
	  <p>
	  	<div class="radio">
		  <label>
		    <input type="radio" name="A" id="" value="A">
		    <span>A)</span>
		   	<?=trim($row['soal_A'])?>
		  </label>
		</div>
		<div class="radio">
		  <label>
		    <input type="radio" name="A" id="" value="B">
		    <span>B)</span>
		    <?=trim($row['soal_B'])?>
		  </label>
		</div>
		<div class="radio">
		  <label>
		    <input type="radio" name="A" id="" value="C">
		    <span>C)</span>
		    <?=trim($row['soal_C'])?>
		  </label>
		</div>
		<div class="radio">
		  <label>
		    <input type="radio" name="A" id="" value="D">
		    <span>D)</span>
		    <?=trim($row['soal_D'])?>
		  </label>
		</div>
	  </p>
	</div>

	<?php

	$no++;
}

?>


	<nav aria-label="">
	  <ul class="pager">
	    <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Previous</a></li>
	    <li class="next"><a href="#">Next <span aria-hidden="true">&rarr;</span></a></li>
	  </ul>
	</nav>

</div>



<div class="col-xs-6 col-sm-3 col-sm-pull-9 sidebar-offcanvas" id="sidebar">
  <div class="list-group">
    <?php include 'side_bar.php'; ?>
  </div>
</div>


<?php include 'footer.php'; ?>