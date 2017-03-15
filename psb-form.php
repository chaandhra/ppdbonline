<?php 

include 'header.php';
include 'koneksi.php';

?>
<div class="container">

<div class="row">


<div class="col-sm-12">
<div class="well well-sm">
<h3 align="center">Form Pendaftaran</h2>
<form class="form-horizontal" role="form" action="simpan-psb.php" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
Data Pribadi
</h3>
</div>
<div class="panel-body">

<div class="form-group">
<label for="inputnisn" class="col-sm-2 controllabel">NISN</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="nisn" 
placeholder="masukan NISN anda" >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Nama Lengkap</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="nama"
placeholder="masukan nama lengkap"  >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Alamat</label>
<div class="col-sm-6">
<textarea class="form-control" rows="3" name="alamat" placeholder="masukan alamat lengkap anda" ></textarea>
</div></div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Tempat Lahir</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="tempat_lahir" 
placeholder="masukan tempat lahir anda">
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Tanggal Lahir</label>
<div class="col-sm-3">
<input type="date" class="form-control" name="tgl" 
placeholder="masukan tanggal lahir anda">
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Jenis Kelamin</label>
<div class="col-sm-3">
<div class="radio">
<label>
<input type="radio" name="jk" 
value="L" > Laki-laki
</label>
</div>

</div>
<div class="col-sm-3">
<div class="radio">
<label>
<input type="radio" name="jk" 
value="P" > Perempuan
</label>
</div>

</div>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Asal Sekolah</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="asal" 
placeholder="masukan asal sekolah anda" >
</div>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">NO Telepon</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="tlp" 
placeholder="masukan asal sekolah anda" >
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
placeholder="00.00" >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-3 controllabel">Nilai UN Matematika</label>
<div class="col-sm-2">
<input type="text" class="form-control" name="mtk" 
placeholder="00.00" >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-3 controllabel">Nilai UN B.Inggris</label>
<div class="col-sm-2">
<input type="text" class="form-control" name="b_ing" 
placeholder="00.00">
</div>
</div>
</div>
</div>
<button type="submit" class="btn btn-success" name="daftar" >daftar</button>
<a href="psb.php"><button type="button" class="btn btn-danger">Batal</button></a>
</form>

</h3>
</div>
</div>
</div>
</div>

<?php 

   




include 'footer.php';

?>
