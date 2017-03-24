<?php 
include 'header.php'; 
?>

<div class="col-xs-12 col-sm-9 col-sm-push-3">



<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Score</div>
  <!-- Table -->
  <table class="table">
    <thead>
    	<tr>
    		<th style="">No</th>
    		<th style="">Nama</th>
    		<th style="">Pelejaran</th>
    		<th style="">Jumlah Soal</th>
            <th style="">Jumlah Benar</th>
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

			$q = "SELECT a.id_user, a.pelajaran, (SELECT COUNT(kategori) from quiz where kategori=a.pelajaran) as jumlah_soal, COALESCE( COUNT( (case when a.jawaban=a.jawaban_benar then 'sama' end ) ), 0) as jumlah_benar from jwb_quiz a group by a.pelajaran ";
    		$sql = mysqli_query($conn, $q);
			
			/*if($posisi==0){
				$posisi = 1;
			}*/

			$no = $posisi + 1;
    		while ($row = mysqli_fetch_array($sql)) {
    			?>

    			<tr>
    				<td style="width: 4%"><?=$no ?></td>
    				<td style="width: 10%"><?=trim($row[0]) ?></td>
    				<td style="width: 15%"><?=trim($row[1]) ?></td>
    				<td style="width: 5%"><?=trim($row[2]) ?></td>
                    <td style="width: 5%"><?=trim($row[3]) ?></td>
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

</div><!-- akhir -->


<div class="col-xs-6 col-sm-3 col-sm-pull-9 sidebar-offcanvas" id="sidebar">
  <div class="list-group">
    <?php include 'side_bar.php'; ?>
  </div>
</div>

<?php include 'footer.php'; ?>