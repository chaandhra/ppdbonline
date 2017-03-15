<?php 

include 'header.php';

$jmlguru = $DB_con->query('select count(*) from guru')->fetchColumn(); 
$jmlkelas = $DB_con->query('select count(*) from kelas')->fetchColumn(); 
$jmlsiswa = $DB_con->query('select count(*) from siswa')->fetchColumn(); 
$jmlsiswaL = $DB_con->query('select count(*) from siswa where kelamin="L" or kelamin ="Laki-laki"')->fetchColumn(); 
$jmlsiswaP = $DB_con->query('select count(*) from siswa where kelamin="P" or kelamin ="Perempuan"')->fetchColumn(); 
$jmlkls7 = $DB_con->query('select count(*) from kelas_siswa left join kelas on kelas_siswa.kode_kelas=kelas.kode_kelas where kelas.kelas="VII"')->fetchColumn(); 
$jmlkls8 = $DB_con->query('select count(*) from kelas_siswa left join kelas on kelas_siswa.kode_kelas=kelas.kode_kelas where kelas.kelas="VIII"')->fetchColumn(); 
$jmlkls9 = $DB_con->query('select count(*) from kelas_siswa left join kelas on kelas_siswa.kode_kelas=kelas.kode_kelas where kelas.kelas="IX"')->fetchColumn(); 


$jmlvii = $DB_con->query('select count(*) from kelas where kelas="VII" and status_aktif="Aktif"')->fetchColumn(); 
$jmlviii = $DB_con->query('select count(*) from kelas where kelas="VIII" and status_aktif="Aktif"')->fetchColumn(); 
$jmlix = $DB_con->query('select count(*) from kelas where kelas="IX" and status_aktif="Aktif"')->fetchColumn(); 
$jmleks = $DB_con->query('select count(*) from ekskul')->fetchColumn(); 
$jmlpres = $DB_con->query('select count(*) from prestasi')->fetchColumn(); 



?>

<body>


<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="well well-sm">
<h2></h2>
<br>
<div class="page-header">
<h2>Data
<small>NAMA SEKOLAH</small>
</h2>
</div>
</div>
<div class="col-xs-12">
<div class="panel panel-default">
<div class="panel-body">
<center>
<h3>Jumlah Guru 
<span class="badge"><?php echo $jmlguru;?></span></h3></center>
</div>
</div>
</div>
<div class="col-xs-6">
<div class="panel panel-default">
<div class="panel-body">
<center>
<h3>Jumlah Kelas 
<span class="badge"><?php echo $jmlkelas;?></span></h3></center>
<div class="container">
<table>
<tr><td width="100">Kelas VII</td><td>: <?php echo $jmlvii;?></td></tr>
<tr><td>Kelas VIII</td><td>: <?php echo $jmlviii;?></td></tr>
<tr><td>Kelas IX</td><td>: <?php echo $jmlix;?></td></tr>
</table>
</div>
</div>
</div>
</div>
<div class="col-xs-6">
<div class="panel panel-default">
<div class="panel-body">
<center>
<h3>Jumlah Siswa 
<span class="badge"><?php echo $jmlsiswa;?></span></h3></center>
<div class="container">
<table>
<tr><td width="190">Siswa Perempuan</td><td>: <?php echo $jmlsiswaP;?></td></tr>
<tr><td>Siswa Laki-laki</td><td>: <?php echo $jmlsiswaL;?></td></tr>
<tr><td width="100">Siswa Kelas VII</td><td>: <?php echo $jmlkls7;?></td></tr>
<tr><td>Siswa Kelas VIII</td><td>: <?php echo $jmlkls8;?></td></tr>
<tr><td>Siswa Kelas IX</td><td>: <?php echo $jmlkls9;?></td></tr>
</table>
</div>
</div>
</div>
</div>

<div class="col-xs-6">
<div class="panel panel-default">
<div class="panel-body">
<center>
<h3>Jumlah Ekskul
<span class="badge"><?php echo $jmleks;?></span></h3></center>
<div class="container">
<?php 
$stmt = $DB_con->prepare('SELECT * FROM ekskul ORDER BY id DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			
				<p><?php echo $nama; ?></p>    
			<?php
		}
	}

	
?>
</div>
</div>
</div>
</div>

<div class="col-xs-6">
<div class="panel panel-default">
<div class="panel-body">
<center>
<h3>Jumlah Prestasi
<span class="badge"><?php echo $jmlpres;?></span></h3></center>
<div class="container">
<?php 
$stmt = $DB_con->prepare('SELECT * FROM prestasi ORDER BY id DESC limit 5');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
				<p><?php echo $prestasi; ?> - <?php echo $juara; ?></p>
			<?php
		}
	}

	
?>
</div>
</div>
</div>
</div>



</div>
</div>
</div>
</div>
<?php 

include 'footer.php';

?>
