<div class="container">
<?php
include'koneksi.php';
include'header.php';
include'headersub.php';
ini_set("display_errors",0);

if (isset($_GET['kode_guru'])) {

	$query=$DB_con->query("select * from guru where kode_guru='$_GET[kode_guru]'");
	$data  = $query->fetch(PDO::FETCH_ASSOC);
}

?>



<form class="form-horizontal" role="form" action="guruedit.php" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title" align="center">
Masukan Data Dengan Benar!
</h2> <a href="guru.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn">Lihat Data</button></a>
</div>
<div class="panel-body">

<div class="form-group">
<label for="inputnisn" class="col-sm-2 controllabel">NIP</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="nip" 
placeholder="masukan NIP anda" value="<?php echo $data['nip'];?>" >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Nama Lengkap</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="nama"
placeholder="masukan nama lengkap" value="<?php echo $data['nama_guru'];?>" >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Alamat</label>
<div class="col-sm-6">
<textarea class="form-control" rows="3" name="alamat" placeholder="masukan alamat lengkap anda" ><?php echo $data['alamat'];?></textarea>
</div></div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Jenis Kelamin</label>
<?php if ($data['jenis_kelamin'] === "L") : ?>
<div class="col-sm-3">
<div class="radio">
<label>
<input type="radio" name="jk" 
value="L" checked> Laki-laki
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

<?php else: ?>

<div class="col-sm-3">
<div class="radio">
<label>
<input type="radio" name="jk" 
value="L"> Laki-laki
</label>
</div>

</div>
<div class="col-sm-3">
<div class="radio">
<label>
<input type="radio" name="jk" 
value="P" checked> Perempuan
</label>
</div>

</div>
<?php endif ;?>
</div>


<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">NO Telepon</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="tlp" 
placeholder="masukan ano Telepon" value="<?php echo $data['no_telepon'];?>" >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Status</label>
<div class="col-sm-4">
<select class="form-control" name="status" value="<?php echo $data['status'];?>">
<option>Aktif</option>

<option>Keluar</option>
</select>
</div>


</div>
</div>
<div class="panel-footer">

<button type="submit" class="btn btn-success" name="edit">Update</button>
<button type="cancel" class="btn btn-danger">Batal</button>
</div>
</div>
</form>

<?php

                            if (isset($_POST['edit'])) {
                        $query2 = $DB_con->query("SELECT kode_guru FROM guru where nip='$_POST[nip]'");
                            $test2 = $query2->fetch(PDO::FETCH_ASSOC);
                            $a=$test2['kode_guru'];

                            $sql = "update guru set nip='$_POST[nip]', nama_guru='$_POST[nama]',kelamin='$_POST[jk]', alamat='$_POST[alamat]', no_telepon='$_POST[tlp]', status_aktif='$_POST[status]' where kode_guru='$a'";
                            $DB_con->exec($sql);


                                                 
echo '<script type="text/javascript">

        alert("Berhasil diedit")
        window.location = "guru.php";
  
</script>';
                        
    
                            }
                            
               



       
?>