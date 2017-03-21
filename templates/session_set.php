<?php
session_start();

$_SESSION['id'] = trim(@$_POST['id']);
$_SESSION['nama'] = trim(@$_POST['nama']);


if($_SESSION['id'] != ''){
	echo $_SESSION['id'];
}

?>