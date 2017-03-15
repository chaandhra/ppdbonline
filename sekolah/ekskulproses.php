<div class="container">
<?php
include'koneksi.php';
include'header.php';
include'headersub.php';
ini_set("display_errors",0);

if (isset($_GET['id'])) {

	$query=$DB_con->query("select * from ekskul where id='$_GET[id]'");
	$data  = $query->fetch(PDO::FETCH_ASSOC);
    $a=$data['poto'];
}

?>




<form class="form-horizontal" role="form"  action="ekskulproses.php" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title" align="center">
Masukan Data Dengan Benar!
</h2> <a href="ekskul.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn">Lihat Data</button></a>
</div>
<div class="panel-body">
<input type="hidden" class="form-control" name="id" 
 value="<?php echo $data['id'];?>" >

<div class="form-group">
<label for="inputnisn" class="col-sm-2 controllabel">Nama Ekskul</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="nama" 
placeholder="masukan prestasi" value="<?php echo $data['nama'];?>" >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Ketua</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="ketua"
placeholder="masukan juara" value="<?php echo $data['ketua'];?>" >
</div>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">kontak</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="kontak" placeholder="masukan keterangan" value="<?php echo $data['kontak'];?>">
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">jadwal</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="jadwal" placeholder="masukan jadwal" value="<?php echo $data['jadwal'];?>"></div>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">keterangan</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="keterangan" placeholder="masukan keterangan" value="<?php echo $data['keterangan'];?>"></div>
</div>



</div>
</div>
<div class="panel-footer">
<?php if (isset($_GET['id'])):?>
<button type="submit" class="btn btn-success" name="edit">Update</button>
<button type="cancel" class="btn btn-danger">Batal</button>
<?php else :?>

<button type="submit" class="btn btn-success" name="simpan">Simpan</button>
<button type="cancel" class="btn btn-danger">Batal</button>
<?php endif; ?>
</div>
</div>
</form>

<?php
ini_set("display_errors",0);



                if (isset($_POST['simpan'])) {
       
                    $sql = "INSERT INTO ekskul VALUES ('','$_POST[nama]','$_POST[ketua]','$_POST[kontak]','$_POST[jadwal]','$_POST[keterangan]')";
                        $DB_con->exec($sql);
echo '<script type="text/javascript">

        alert("Berhasil ditambah")
        window.location = "ekskul.php";
  
</script>';
            
   



                    
                        }
                            else {

                           if (isset($_POST['edit'])) {
       
                            $sql = "UPDATE ekskul set nama='$_POST[nama]',ketua='$_POST[ketua]', kontak='$_POST[kontak]', jadwal='$_POST[jadwal]', keterangan='$_POST[keterangan]'where id='$_POST[id]'";
                            $DB_con->exec($sql);


                                                 

      echo '<script type="text/javascript">

        alert("Berhasil diupdate")
        window.location = "ekskul.php";
  
</script>';               


}
}

       
?>