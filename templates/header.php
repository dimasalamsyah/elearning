<?php
session_start();
$link = "http://localhost:8080/elearning/";

if(!isset($_SESSION['id'])){
  header("location: ".$link."login.php");
}

/*dgunakan untuk kelas aktif side_bar.php*/
/*if(trim(@$_GE['pelajaran']=='Bahasa Indonesia' )){
  $aktif_1 = "aktif";
}elseif (trim(@$_GE['pelajaran']=='IPA' )) {
  $aktif_2 = "aktif";
}elseif (trim(@$_GE['pelajaran']=='Matematika' )) {
  $aktif_3 = "aktif";
}else{
  $aktif_4 = "aktif";
}
*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>E-Learning</title>

	<link rel="stylesheet" type="text/css" href="<?=$link?>bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=$link?>css/style.css">
  <link rel="stylesheet" type="text/css" href="<?=$link?>bower_components/bootstrap-select/dist/css/bootstrap-select.min.css">

	<script src="<?=$link?>bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?=$link?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?=$link?>bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>


	<script src="<?=$link?>js\app.js"></script>


</head>

<style>
  .aktif{
    /*background-color: #2966a3;*/
    background-color: #eee;
  }
  
/*  .navbar .nav>li>a:focus {
    background-color: green;
  }
  .navbar .nav>li>a> .active {
    background-color: green;
  }

.navbar-nav>.active>a, .navbar-nav>.active>a:hover, .navbar-nav>.active>a:focus {
  background-color: red;
}*/

.navbar .nav > li.dropdown.open.active > a:hover, 
.navbar .nav > li.dropdown.open > a
{
   color: #fff;
   background-color: #006699;
   border-color: #fff;
}
</style>


<body>


<nav class="navbar navbar-fixed-top navbar-inverse navbar-custom" style="background-color: #3174b0; border-color: #3174b0; ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=$link?>">E-Learning</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <!-- <li><a href="<?=$link?>templates/soal.php">Soal</a></li> -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a><b>Daftar Soal</b></a></li>
            <li class="divider"></li>
            <li><a href="<?=$link?>templates/soal_data.php?pelajaran=Bahasa Indonesia">Bahasa Indonesia</a></li>
            <li><a href="<?=$link?>templates/soal_data.php?pelajaran=Ilmu Pengetahuan Alam">Ilum Pengetahuan Alam</a></li>
            <li><a href="<?=$link?>templates/soal_data.php?pelajaran=Matematika">Matematika</a></li>

            <li class="divider"></li>

            <li><a href="<?=$link?>templates/soal.php"><b>Tambahkan Soal</b></a></li>
            <li><a href="<?=$link?>templates/score.php"><b>Lihat Score</b></a></li>
            <li><a href="<?=$link?>templates/komentar.php"><b>Lihat Komentar</b></a></li>
          </ul>
        </li>

      </ul>
      <ul class="nav navbar-nav navbar-right" style="margin-right: 0px;">
        <li id="c" class="dropdown" style="color:white; font-family:arial; padding-top: 9px; padding-bottom: 11px;">
            <span class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="margin-right:10px;">
              <?=$_SESSION['nama']?>
              <img class="img-circle"  src="http://graph.facebook.com/<?=$_SESSION['id']?>/picture" style="width:30px; height:30px; margin-left:5px;">
            </span>
            
            <ul class="dropdown-menu" style="background-color:white;">
                <li class="login" id="" style=""><a href=""><span class="glyphicon glyphicon-log-out" style="margin-right:5px;"></span>Logout</a></li>
            </ul>
        </li>
      </ul>

    </div><!-- /.nav-collapse -->
  </div><!-- /.container -->
</nav><!-- /.navbar -->

    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right"> <!-- awal row -->
