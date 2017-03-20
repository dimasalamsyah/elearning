<?php include 'header.php'; ?>

<div class="col-xs-12 col-sm-9 col-sm-push-3">

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Tambahkan Soal</h3>
	  </div>
	  <div class="panel-body">
	    
	  <!-- form -->
	  	<form id="formSoal" method="post">
		  <div class="form-group">
		    <label for="">Pilih Pelajaran</label>
		    <select class="form-control selectpicker" name="pelajaran">
			  <option>Bahasa Indonesia</option>
			  <option>Matematika</option>
			  <option>Ilmu Pengetahuan Alam</option>
			</select>
		  </div>
		  <div class="form-group">
		    <label for="">Pertanyaan</label>
		    <textarea class="form-control" rows="3" name="pertnyaan"></textarea>
		  </div>
		  <div class="form-group">
		    <label for="">Pilihan Jawaban</label>
		    <div id="jawabCol">
		    	<textarea class="form-control" rows="3" id="A" name="A"></textarea>
		    </div>
		    <br>
		    <button type="button" class="btn btn-default" id="addJawaban">Tambah Pilihan Jawaban</button>
		    <button type="button" class="btn btn-default" id="finishJawaban">tes</button>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputFile">Keterangan Penyelesaian Soal</label>
		    <textarea class="form-control" rows="3" name="keterangan"></textarea>
		    <input type="file" id="fileGambar" name="fileGambar" style="margin-top: 10px;">
		    <p class="help-block">Upload gambar jika ada.</p>
		  </div>
		  <button type="submit" class="btn btn-default">Finish!</button>
		</form>

	  </div>
	</div>

</div>

<script>

	$(document).ready(function(){
		var index = 0;
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

	        //console.log("terkhir" + huruf[index]);
	    });
	    
	    $("#finishJawaban").click(function(){

	    });

	    $("#formSoal").submit(function(e) {
	    	e.preventDefault();
	    	var data = $( this ).serialize();
	    	window.location.href = 'soal_save.php?'+ data;

	    	/*$.ajax({
	           type: "POST",
	           url: 'coba1.php',
	           data: data,
	           success: function(data)
	           {

	           }
	        });*/
	
	    });
		

	});
</script>


<?php include 'footer.php'; ?>