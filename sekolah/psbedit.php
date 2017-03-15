<?php 

include 'header.php';
include 'koneksi.php';

if (isset($_GET['no_reg'])) {
    $query = $DB_con->query("SELECT * FROM psb WHERE no_reg = '$_GET[no_reg]'");
    $data  = $query->fetch(PDO::FETCH_ASSOC);
} else {
 if (isset($_POST)) {
 	$A=$_POST['b_indo'];
$B=$_POST['b_ing'];
$C=$_POST['mtk'];
$D=$A+$B+$C;


  $sql="UPDATE psb SET nisn='$_POST[nisn]',
  			nama='$_POST[nama]',
  			alamat='$_POST[alamat]',
  			tempat_lahir='$_POST[tempat_lahir]',
  			tanggal_lahir='$_POST[tgl]',
  			jenis_kelamin='$_POST[jk]',
  			asal_sekolah='$_POST[asal]',
  			no_tlpn='$_POST[tlp]',
  			b_indo='$_POST[b_indo]',
  			b_ing='$_POST[b_ing]',
  			mtk='$_POST[mtk]',	
  			jml='$D'
  			 WHERE no_reg='$_POST[no_reg]'";
$DB_con->exec($sql);
}


echo '<script type="text/javascript">

        alert("Berhasil diupdate")
        window.location = "psb.php";
  
</script>';


}
?>


<body>
 <div class="clearfix"></div>
    	
    
<div class="container-fluid" style="margin-top:80px;">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="well well-sm">
<h3>Edit Pendaftaran Siswa Baru</h2>
        
<br>


<form class="form-horizontal" role="form" action="psbedit.php" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
Data Pribadi
</h3>
</div>
<div class="panel-body">

<div class="form-group">
<label for="inputnisn" class="col-sm-2 controllabel">No Registrasi</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="no_reg" 
 value="<?php echo $data['no_reg'];?>"  >
</div>
</div>
<div class="form-group">
<label for="inputnisn" class="col-sm-2 controllabel">NISN</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="nisn" 
 value="<?php echo $data['nisn'];?>">
</div>
</div>
<div class="form-group">
<label for="inputnama	" class="col-sm-2 controllabel">Nama Lengkap</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="nama"
 value="<?php echo $data['nama'];?>" >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Alamat</label>
<div class="col-sm-6">
<textarea class="form-control" rows="3" name="alamat"><?php echo $data['alamat'];?></textarea>
</div></div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Tempat Lahir</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="tempat_lahir" 
value="<?php echo $data['tempat_lahir'];?>">
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Tanggal Lahir</label>
<div class="col-sm-3">
<input type="date" class="form-control" name="tgl" 
value="<?php echo $data['tanggal_lahir'];?>">
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Jenis Kelamin</label>
<?php if ($data['jenis_kelamin'] === "L") : ?>

<div class="col-sm-3">
<div class="radio">
<label>
<input type="radio" name="jk" 
value="L" checked > Laki-laki
</label>
</div>
</div>
<div class="col-sm-3">
<div class="radio">
<label>
<input type="radio" name="jk" 
value="P"  > Perempuan
</label>
</div>
</div>
<?php else : ?>
<div class="col-sm-3">
<div class="radio">
<label>
<input type="radio" name="jk" 
value="L"  > Laki-laki
</label>
</div>
</div>
<div class="col-sm-3">
<div class="radio">
<label>
<input type="radio" name="jk" 
value="P" checked > Perempuan
</label>
</div>
</div>
	<?php endif; ?>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Asal Sekolah</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="asal" 
value="<?php echo $data['asal_sekolah'];?>" >
</div>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">NO Telepon</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="tlp" 
value="<?php echo $data['no_tlpn'];?>" >
</div>
</div>

</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
Data Nilai Ujian Nasional
</h3>
</div>
<div class="panel-body">
<div class="form-group">
<label for="inputnama" class="col-sm-3 controllabel">Nilai UN B.Indonesia</label>
<div class="col-sm-2">
<input type="text" class="form-control" name="b_indo" 
value="<?php echo $data['b_indo'];?>" >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-3 controllabel">Nilai UN Matematika</label>
<div class="col-sm-2">
<input type="text" class="form-control" name="mtk" 
value="<?php echo $data['mtk'];?>" >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-3 controllabel">Nilai UN B.Inggris</label>
<div class="col-sm-2">
<input type="text" class="form-control" name="b_ing" 
value="<?php echo $data['b_ing'];?>">
</div>
</div>
</div>
</div>

	<button type="submit" class="btn btn-success" >Edit</button>
<button type="cancel" class="btn btn-danger">Batal</button>

</form>

</div>
</div>
</div>
</div>

</body>


