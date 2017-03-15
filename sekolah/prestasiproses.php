<div class="container">
<?php
include'koneksi.php';
include'header.php';
include'headersub.php';
ini_set("display_errors",0);

if (isset($_GET['id'])) {

	$query=$DB_con->query("select * from prestasi where id='$_GET[id]'");
	$data  = $query->fetch(PDO::FETCH_ASSOC);
}

?>




<form class="form-horizontal" role="form" action="prestasiproses.php" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title" align="center">
Masukan Data Dengan Benar!
</h2> <a href="prestasi.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn">Lihat Data</button></a>
</div>
<div class="panel-body">
<input type="hidden" class="form-control" name="id" 
 value="<?php echo $data['id'];?>" >

<div class="form-group">
<label for="inputnisn" class="col-sm-2 controllabel">Prestasi</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="prestasi" 
placeholder="masukan prestasi" value="<?php echo $data['prestasi'];?>" >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Juara</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="juara"
placeholder="masukan juara" value="<?php echo $data['juara'];?>" >
</div>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Keterangan</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="keterangan" placeholder="masukan keterangan" value="<?php echo $data['keterangan'];?>">
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
    
      
                    $sql = "INSERT INTO prestasi VALUES ('','$_POST[prestasi]','$_POST[juara]','$_POST[keterangan]')";
                        $DB_con->exec($sql);
echo '<script type="text/javascript">

        alert("Berhasil ditambah")
        window.location = "prestasi.php";
  
</script>';


                       
                        }
                            else {

                           if (isset($_POST['edit'])) {
                        $id=$_GET['id'];

                            $sql = "update prestasi set  prestasi='$_POST[prestasi]',juara='$_POST[juara]', keterangan='$_POST[keterangan]' where id='$_POST[id]'";
                            $DB_con->exec($sql);


                                                 
echo '<script type="text/javascript">

        alert("Berhasil diedit")
        window.location = "prestasi.php";
  
</script>';
                     


}
}

       
?>