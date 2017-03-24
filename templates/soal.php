<?php 
include 'header.php'; 
include '../koneksi.php';

$id = trim(@$_GET['id']) ?: '';
$q = "SELECT * FROM quiz where id='$id' ";
$sql = mysqli_query($conn, $q);
$row = mysqli_fetch_array($sql);

$kategori = trim($row['kategori']);
$pertanyaan = trim($row['pertanyaan']);
$soal_A = trim($row['soal_A']);
$soal_B = trim($row['soal_B']);
$soal_C = trim($row['soal_C']);
$soal_D = trim($row['soal_D']);
$jawaban = trim($row['jawaban']);
$keterangan = trim($row['keterangan']);
$gambar = trim($row['gambar']);


if($id==''){
	$title = "Tambah";
	$infoGambar = "Upload gambar jika ada.";
	$disabledGambar = "";
}else{
	$title = "Edit";
	$infoGambar = "Gambar tidak bisa di edit!.";
	$disabledGambar = "disabled='disabled'";
}

$selected_1="";
$selected_2="";
$selected_3="";
/*untuk edit di form soal*/
if($kategori=='Matematika') {
	$selected_3 = "selected='selected'";
}elseif ($kategori=='Ilmu Pengetahuan Alam') {
	$selected_2 = "selected='selected'";
}else{
	$selected_1 = "selected='selected'";
}

$selectedJwb_1="";
$selectedJwb_3="";
$selectedJwb_4="";
$selectedJwb_4="";

if($jawaban=='B') {
	$selectedJwb_2 = "selected='selected'";
}elseif ($jawaban=='C') {
	$selectedJwb_3 = "selected='selected'";
}elseif ($jawaban=='D') {
	$selectedJwb_4 = "selected='selected'";
}else{
	$selectedJwb_1 = "selected='selected'";
}


?>

<div class="col-md-12">

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><?=$title?> Soal</h3>
	  </div>
	  <div class="panel-body">
	    
	  <!-- form -->
	  	<form id="formSoal" method="post" action="soal_save.php" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="">Pilih Pelajaran</label>
		    <select class="form-control selectpicker" name="pelajaran">
			  <option <?=$selected_1?>>Bahasa Indonesia</option>
			  <option <?=$selected_2?>>Matematika</option>
			  <option <?=$selected_3?>>Ilmu Pengetahuan Alam</option>
			</select>
			<input type="text" name="id" value="<?=$id?>" style="display: none"> <!-- untuk validasi ketika edit atau save -->
		  </div>
		  <div class="form-group">
		    <label for="">Pertanyaan</label>
		    <textarea class="form-control" rows="3" name="pertanyaan"><?=$pertanyaan?></textarea>
		  </div>
		  <div class="form-group">
		    <label for="">Pilihan Jawaban</label>
		    <div id="jawabCol">
		    	<textarea class="form-control" rows="3" id="A" name="A" placeholder="Soal A"><?=$soal_A?></textarea>
		    	<textarea class="form-control" rows="3" id="A" name="B" style='margin-top: 10px;' placeholder="Soal B"><?=$soal_B?></textarea>
		    	<textarea class="form-control" rows="3" id="A" name="C" style='margin-top: 10px;' placeholder="Soal C"><?=$soal_C?></textarea>
		    	<textarea class="form-control" rows="3" id="A" name="D" style='margin-top: 10px;' placeholder="Soal D"><?=$soal_D?></textarea>
		    </div>
		    <br>
		    <!-- <button type="button" class="btn btn-default" id="addJawaban">Tambah Pilihan Jawaban</button> -->
		  </div>
		  <div class="form-group">
		    <label for="">Pilih Jawaban Yang Benar</label>
		    <select class="form-control selectpicker" name="jawaban">
			  <option <?=$selectedJwb_1?> >A</option>
			  <option <?=$selectedJwb_3?> >B</option>
			  <option <?=$selectedJwb_4?> >C</option>
			  <option <?=$selectedJwb_4?> >D</option>
			</select>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputFile">Keterangan Penyelesaian Soal</label>
		    <textarea class="form-control" rows="3" name="keterangan"><?=$keterangan?></textarea>
		    <input type="file" id="fileGambar" name="fileGambar" style="margin-top: 10px;" value="c:\fakepath\Logo HUT RI ke 71.png" <?=$disabledGambar?>>
		    <p class="help-block"><?=$infoGambar?></p>
		  </div>
		  <button type="submit" class="btn btn-default">Selesai</button>
		</form>

	  </div>
	</div>

</div>

<!-- <div class="col-xs-6 col-sm-3 col-sm-pull-9 sidebar-offcanvas" id="sidebar">
  <div class="list-group">
    
  </div>
</div>
 -->

<script>

	$(document).ready(function(){
/*		var index = 0;
		var indexPlus = 1;
		var huruf = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];

		var arrjawaban = [ $("#A").val(), $("#B").val(), $("#C").val(), $("#D").val() ];
    	var arr = JSON.stringify(arrjawaban);

		$("#addJawaban").click(function(){

	        $("#jawabCol").append("<textarea class='form-control' rows='3' style='margin-top: 10px;' id='"+ huruf[indexPlus] +"' name='"+ huruf[indexPlus] +"'></textarea>");
	        	
	        if(index == 2){
	        	$( "#addJawaban" ).prop( "disabled", true );
	        }
	        index++;
	        indexPlus++;
	    });
	    */
	    /*$("#finishJawaban").click(function(){
	    	console.log($("#fileGambar").val());
	    });*/

	    /*$("#formSoal2").submit(function(e) {
	    	e.preventDefault();
	    	var data = new FormData(this);
	    	//window.location.href = 'soal_save.php?'+ data;

	    	$.ajax({
	           type: "POST",
	           url: 'soal_save.php',
	           data: data,
	           contentType: false,
	           cache: false,
	           processData: false,
	           success: function(data)
	           {
	           		console.log(data);
	           }
	        });
	
	    });

	    $("#formSoal1").on('submit',(function(e){

	        e.preventDefault();
	        $.ajax({
	          url:'soal_save.php',
	          type:'POST',
	          data: new FormData(this),
	          contentType: false,
	          cache: false,
	          processData: false,
	          success: function(data){
	            console.log(data);
	          },error: function(){
	            alert();
	          }
	        });

	    }))*/
		

	});
</script>


<?php include 'footer.php'; ?>