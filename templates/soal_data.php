<?php include 'header.php'; ?>

<div class="col-xs-12 col-sm-9 col-sm-push-3">

<div style="overflow-x: scroll;"><!-- overflow -->


<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Daftar Soal <?=@$_GET['pelajaran']?></div>
  <!-- Table -->
  <table class="">
    <thead>
    	<tr>
    		<th style="width: 100px">No</th>
    		<th style="width: 250px">Pertanyaan</th>
    		<th style="width: 200px">Soal A</th>
    		<th style="width: 200px">Soal B</th>
    		<th style="width: 200px">Soal C</th>
    		<th style="width: 200px">Soal D</th>
    		<th style="width: 50px">Jawaban</th>
    		<th style="width: 100px">Ket</th>
    		<th style="width: 50px">Gambar</th>
    		<th style="width: 100px"></th>
    	</tr>
    </thead>
    <tbody>
    	
    	<?php
    		include '../koneksi.php';
    		$batas = 2;
			$halaman = @$_GET['page'];
			if(empty($halaman)){
			    $posisi = 0;
			    $halaman = 1;
			}else{
			    $posisi = ($halaman - 1) * $batas;
			}

			$q = "SELECT * from quiz where kategori='".@$_GET['pelajaran']."' order by id asc limit $posisi,$batas ";
    		$sql = mysqli_query($conn, $q);
			
			/*if($posisi==0){
				$posisi = 1;
			}*/

			$no = $posisi + 1;
    		while ($row = mysqli_fetch_array($sql)) {
    			?>

    			<tr>
    				<td style="width: 100px"><?=$no ?></td>
    				<td style="width: 250px"><?=trim($row[2]) ?></td>
    				<td style="width: 200px"><?=trim($row[3]) ?></td>
    				<td style="width: 200px"><?=trim($row[4]) ?></td>
    				<td style="width: 200px"><?=trim($row[5]) ?></td>
    				<td style="width: 200px"><?=trim($row[6]) ?></td>
    				<td style="width: 50px"><?=trim($row[7]) ?></td>
    				<td style="width: 100px"><?=trim($row[8]) ?></td>
    				<td style="width: 50px"><?=trim($row[9]) ?></td>
    				<td style="width: 100px">
    					
						  <span class="btn btn-default glyphicon glyphicon-pencil" aria-hidden="true"></span>
						  <span class="btn btn-default glyphicon glyphicon-remove" aria-hidden="true"></span>
    					<!-- <button type="button" class="btn btn-default btn-sm">
						</button>
						<button type="button" class="btn btn-default btn-sm">
						</button> -->

    				</td>
    			</tr>

    			<?php
    			$no++;
    		}	
    	?>

    </tbody>
  </table>

	<?php
	  // Langkah 3 : Hitung Total data dan halaman serta link 1,2,3..
	$paging2 = mysqli_query($conn,"SELECT * from quiz where kategori='".@$_GET['pelajaran']."' ");
	$jmldata = mysqli_num_rows($paging2);
	$jmlhalaman = ceil($jmldata/$batas);
	 
	echo"<br>";
	echo'<ul class="pagination" style="float: right;">';
	for($i=1; $i<=$jmlhalaman; $i++){
	    if($i != $halaman){
	        echo "<li><a href=\"?pelajaran=".@$_GET['pelajaran']."&page=$i\">$i</a></li>";
	    }else{
	        echo "<li><span>$i</span></li>";
	    }
	}
	
	echo '</ul>';
	//echo "<p>Total anggota : <b>$jmldata</b> orang</p>";

?>

	</div>

   </div>

</div><!-- end overflow -->

<div class="col-xs-6 col-sm-3 col-sm-pull-9 sidebar-offcanvas" id="sidebar">
  <div class="list-group">
    <?php include 'side_bar.php'; ?>
  </div>
</div>

<?php include 'footer.php'; ?>