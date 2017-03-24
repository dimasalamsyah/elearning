<?php include 'header.php'; ?>

<div class="col-md-12">

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Daftar Soal <?=@$_GET['pelajaran']?></div>
  <!-- Table -->
  <table class="table">
    <thead>
    	<tr>
    		<th style="">No</th>
    		<th style="">Pertanyaan</th>
    		<th style="">Soal A</th>
    		<th style="">Soal B</th>
    		<th style="">Soal C</th>
    		<th style="">Soal D</th>
    		<th style="">Jawaban</th>
    		<th style="">Ket</th>
    		<th style="">Gambar</th>
    		<th style=""></th>
    	</tr>
    </thead>
    <tbody>
    	
    	<?php
    		include '../koneksi.php';
    		$batas = 5;
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
    				<td style="width: 4%"><?=$no ?></td>
    				<td style="width: 25%"><?=trim($row[2]) ?></td>
    				<td style="width: 10%"><?=trim($row[3]) ?></td>
    				<td style="width: 10%"><?=trim($row[4]) ?></td>
    				<td style="width: 10%"><?=trim($row[5]) ?></td>
    				<td style="width: 10%"><?=trim($row[6]) ?></td>
    				<td style="width: 5%"><?=trim($row[7]) ?></td>
    				<td style="width: 5%"><?=trim($row[8]) ?></td>
    				<td style="width: 5%"><?=trim($row[9]) ?></td>
    				<td style="width: 5%">
    					
						  <a href="<?=$link?>templates/soal.php?id=<?=trim($row['id'])?>"><span class="glyphicon glyphicon-pencil btn-form" aria-hidden="true" ></span></a>
						  <a href="soal_hapus.php?id=<?=trim($row['id'])?>&pelajaran=<?=@$_GET['pelajaran']?>"><span class="glyphicon glyphicon-remove btn-form" aria-hidden="true" onClick="return confirm('Yakin ingin dihapus?')"></span></a>
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


<!-- <div class="col-xs-6 col-sm-3 col-sm-pull-9 sidebar-offcanvas" id="sidebar">
  <div class="list-group">
   
  </div>
</div> -->

<?php include 'footer.php'; ?>