<?php
$link = "http://localhost:8080/elearning/";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home | E-Learning</title>

	<link rel="stylesheet" type="text/css" href="<?=$link?>bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=$link?>css/style.css">
  <link rel="stylesheet" type="text/css" href="<?=$link?>bower_components/bootstrap-select/dist/css/bootstrap-select.min.css">

	<script src="<?=$link?>bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?=$link?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?=$link?>bower_components/bootstrap-select/dist/js/bootstrap-select.min.js"></script>


	<script src="<?=$link?>js\app.js"></script>


</head>
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
        <li class="active"><a href="#">Home</a></li>
        <li><a href="<?=$link?>templates/soal.php">Soal</a></li>
      </ul>
    </div><!-- /.nav-collapse -->
  </div><!-- /.container -->
</nav><!-- /.navbar -->

    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right"> <!-- awal row -->
