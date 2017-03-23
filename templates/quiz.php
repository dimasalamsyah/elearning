<?php 
include 'header.php'; 
include '../koneksi.php';

$batas = 1;
$halaman = @$_GET['page'];
if(empty($halaman)){
    $posisi = 0;
    $halaman = 1;
}else{
    $posisi = ($halaman - 1) * $batas;
}


$pelajaran = trim(@$_GET['pelajaran']);
$q = "SELECT * from quiz where kategori='$pelajaran' order by id asc limit $posisi,$batas";
$sql = mysqli_query($conn, $q);

$q1 = "SELECT * from quiz where kategori='$pelajaran'";
$sql1 = mysqli_query($conn, $q1);

$count = mysqli_num_rows($sql1);
$page = @$_GET['page'] ?: 1;
$pagePlus = $page + 1;
$pageMin = $page - 1;


$no = $posisi + 1;

?>

<div class="col-xs-12 col-sm-9 col-sm-push-3">

<?php
//echo '';

while ($row = mysqli_fetch_array($sql)) {
		
	?>

	<div class="jumbotron" style="height: auto;">
	  <h4><span style="margin-right: 15px;"><?=$no?>.</span><span><?=$row['pertanyaan']?></span></h4>
	  <p>
	  	<input type="text" name="idQuiz" value="<?=$row['id']?>" style="display: none">
	  	<input type="text" name="pelajaran" value="<?=$pelajaran?>" style="display: none">
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
	  	<?php

	  		if($page==1){
	  			echo '<li class="previous"><a ><span aria-hidden="true">&larr;</span> Previous</a></li>';
	  		}else{
	  			echo '<li class="previous"><a href= "'.$link.'templates/quiz.php?pelajaran='.$pelajaran.'&page='.$pageMin.'" onclick="prev()"><span aria-hidden="true">&larr;</span> Previous</a></li>';
	  		}

	  		
	  		echo "<li>".$page." /  ".$count."</li>";

	  		if($page == $count){
				echo ' <li class="next" ><a href="quiz_finish.php?pelajaran='.$pelajaran.'" onclick="next()">Next <span aria-hidden="true">&rarr;</span></a></li> ';
			}else{
				echo '<li class="next" ><a href= "'.$link.'templates/quiz.php?pelajaran='.$pelajaran.'&page='.$pagePlus.'" onclick="next()">Next <span aria-hidden="true">&rarr;</span></a></li>';
			}

	  	?>
	    
	    <!-- href= "'.$link.'templates/quiz.php?pelajaran='.$pelajaran.'&page='.$pagePlus.'"  -->
	    <!-- quiz_finish.php -->
	    
	  </ul>
	</nav>

</div>

<div class="col-xs-6 col-sm-3 col-sm-pull-9 sidebar-offcanvas" id="sidebar">
  <div class="list-group">
    <?php include 'side_bar.php'; ?>
  </div>
</div>

<script>

	function next(){

		$.post("quiz_save.php",{
			idQuiz: $.trim( $("input[name=idQuiz]").val() ), 
			jawaban: $.trim( $("input[name=A]:checked").val() ),
			pelajaran: $.trim( $("input[name=pelajaran]").val() )
		})
		.done(function(data){
			console.log(data);

			alert(data);
		});
		//console.log($("input[name=A]:checked").val());
	}
	

</script>

<?php include 'footer.php'; ?>