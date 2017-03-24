<span href="#" class="list-group-item active">Menu</span>

<span class="list-group-item" style=""><b>Soal</b></span>
<a href="<?=$link?>templates/quiz.php?pelajaran=Bahasa Indonesia" class="list-group-item <?php if(trim($_GET['pelajaran']=='Bahasa Indonesia')){ echo "aktif"; } ?> " style="">B. Indonesia</a>
<a href="<?=$link?>templates/quiz.php?pelajaran=Ilmu Pengetahuan Alam" class="list-group-item <?php if(trim($_GET['pelajaran']=='Ilmu Pengetahuan Alam')){ echo "aktif"; } ?>" style="">Ilmu Pengetahuan Alam</a>
<a href="<?=$link?>templates/quiz.php?pelajaran=Matematika" class="list-group-item <?php if(trim($_GET['pelajaran']=='Matematika')){ echo "aktif"; } ?>" style="">Matematika</a>

<a href="<?=$link?>templates/score_siswa.php" class="list-group-item <?php if(trim($_GET['pelajaran']=='Matematika')){ echo "aktif"; } ?>" class="list-group-item"><b>Lihat Score</b></a>