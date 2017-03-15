<div class="container">

<?php
include 'koneksi.php';
include 'header.php';

if (isset($_GET['nis'])) {

	$query=$DB_con->query("SELECT siswa.nis,siswa.nama_siswa ,kelas.kelas,kelas.nama_kelas,kelas.tahun_ajar  FROM siswa 
                        LEFT JOIN kelas_siswa ON siswa.kode_siswa=kelas_siswa.kode_siswa 
                        RIGHT JOIN kelas ON kelas_siswa.kode_kelas=kelas.kode_kelas 
                       
                        where siswa.nis='$_GET[nis]'");
	$data  = $query->fetch(PDO::FETCH_ASSOC);
}

if (isset($_GET['catatan'])) {

	$query2=$DB_con->query("SELECT bk.*, siswa.nama_siswa, siswa.nis , kelas.nama_kelas ,kelas.kelas
                FROM bk
                LEFT JOIN kelas ON bk.kode_kelas = kelas.kode_kelas
                LEFT JOIN siswa ON bk.kode_siswa = siswa.kode_siswa

                where bk.catatan='$_GET[catatan]'");
	$data2=$query2->fetch(PDO::FETCH_ASSOC);
}

?>


<form class="form-horizontal" role="form" action="bkproses2.php" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title" align="center">
Masukan Data Dengan Benar!
</h2> <a href="bk.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn">Lihat Data</button></a>
</div>
<div class="panel-body">
<div class="form-group">
<div class="col-sm-1">
<?php if (isset($_GET['catatan'])) : ?>
<input type="text" class="form-control" name="id" 
 value="<?php echo $data2['id'];?>"  >
<?php else : ?>
 
<?php endif; ?>
</div>
</div>
<div class="form-group">
<label for="inputnisn" class="col-sm-2 controllabel">NIS</label>
<div class="col-sm-4">
<?php if (isset($_GET['nis'])) : ?>
<input type="text" class="form-control" name="nis" 
 value="<?php echo $data['nis'];?>"  >
<?php else : ?>
	<input type="text" class="form-control" name="nis" 
 value="<?php echo $data2['nis'];?>"  >
<?php endif; ?>
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel" >Nama Lengkap</label>
<div class="col-sm-6"><?php if (isset($_GET['nis'])) : ?>
<input type="text" class="form-control" name="nama"
value="<?php echo $data['nama_siswa'];?>"  >
<?php else : ?>
	<input type="text" class="form-control" name="nama" 
value="<?php echo $data2['nama_siswa'];?>"  >
<?php endif; ?></div>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Kelas</label>
<?php if (isset($_GET['nis'])) : ?>
<div class="col-sm-3">

<input type="text" class="form-control" name="kelas" 
 value="<?php echo $data['kelas'];?>"  >
</div>
<div class="col-sm-3">
 <input type="text" class="form-control" name="kelas2"  
 value="<?php echo $data['nama_kelas'];?>">
 </div>
<?php else : ?>
	<div class="col-sm-3">
	<input type="text" class="form-control" name="kelas"  
value="<?php echo $data2['kelas'];?>"  >
</div>
<div class="col-sm-3">
<input type="text" class="form-control" name="kelas2"
 value="<?php echo $data2['nama_kelas'];?>"  >
</div>

<?php endif; ?>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Tanggal</label>
<?php if (isset($_GET['nis'])) : ?>
<div class="col-sm-3">

<input type="date" class="form-control" name="tgl" value="<?php echo $data['tanggal'];?>" >
</div>

<?php else : ?>
    <div class="col-sm-3">
<input type="date" class="form-control" name="tgl" value="<?php echo $data2['tanggal'];?>" >	

</div>
<?php endif; ?>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Pelanggaran</label>
<?php if (isset($_GET['nis'])) : ?>
<div class="col-sm-6">
<textarea class="form-control" rows="3" name="pel" ></textarea>
</div>
<?php else: ?>
   <div class="col-sm-6">
<textarea class="form-control" rows="3" name="pel" ><?php echo $data2['catatan'];?></textarea>
</div>
<?php endif ; ?> 
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Keterangan</label>
<?php if (isset($_GET['nis'])) : ?>
<div class="col-sm-6">
<textarea class="form-control" rows="3" name="ket" ></textarea>
</div>
<?php else: ?>
   <div class="col-sm-6">
<textarea class="form-control" rows="3" name="ket" ><?php echo $data2['keterangan'];?></textarea>
</div>
<?php endif ; ?> 

</div>


<div class="panel-footer">
<?php if (isset($_GET['catatan'])):?>
<button type="submit" class="btn btn-success" name="update">Update</button>
<button type="cancel" class="btn btn-danger">Batal</button>
<?php else :?>

<button type="submit" class="btn btn-success" name="simpan">Simpan</button>
<a href="bk.php"><button type="button" class="btn btn-danger">Batal</button></a>
<?php endif; ?>
</div>
</div>
</form>

    



<?php
                 if (isset($_POST['simpan'])) {
    

$a=$_POST['nis'];
   $stmt = $DB_con->query("SELECT * FROM siswa WHERE nis='$a'");
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
    $b=$userRow['kode_siswa'];



  $c=$_POST['kelas2'];
$d = $DB_con->query("SELECT * FROM kelas WHERE nama_kelas='$c'");  
 $userRow2=$d->fetch(PDO::FETCH_ASSOC);
    $e=$userRow2['kode_kelas'];

    $sql = "INSERT INTO bk VALUES ('','$b','$e', '$_POST[tgl]', '$_POST[pel]', '$_POST[ket]')";
                        $DB_con->exec($sql);
echo '<script type="text/javascript">

        alert("Berhasil ditambah")
        window.location = "bk.php";
  
</script>';

} else {
                            if (isset($_POST['update'])) {


$h=$_POST['nis'];
   $i = $DB_con->query("SELECT * FROM siswa WHERE nis='$h'");
    $j=$i->fetch(PDO::FETCH_ASSOC);
    $k=$j['kode_siswa'];



  $l=$_POST['kelas2'];
 $m = $DB_con->query("SELECT * FROM kelas WHERE nama_kelas='$l'");  
$n=$m->fetch(PDO::FETCH_ASSOC);
    $o=$n['kode_kelas'];



                       $sql = "UPDATE bk set kode_siswa='$k',kode_kelas='$o', tanggal='$_POST[tgl]',catatan='$_POST[pel]',Keterangan='$_POST[ket]' where id='$_POST[id]'";
                            $DB_con->exec($sql);
                         echo '<script type="text/javascript">

        alert("Berhasil diupdate")
        window.location = "bk.php";
  
</script>';

    
                       }
                   }
                       

?>