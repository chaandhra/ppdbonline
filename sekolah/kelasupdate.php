<div class="container">
<?php include'koneksi.php';
include'header.php';
include'headersub.php';

ini_set("display_errors",0);

if (isset($_GET['kode_kelas'])) {

	$query=$DB_con->query("select * from kelas where kode_kelas='$_GET[kode_kelas]'");
	$data  = $query->fetch(PDO::FETCH_ASSOC);
	
}

?>



<form class="form-horizontal" role="form" action="kelasupdate.php" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title" align="center">
Masukan Data Dengan Benar!
</h2> <a href=".php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn">Lihat Data</button></a>
</div>
<div class="panel-body">

<div class="form-group">
<label for="inputnisn" class="col-sm-2 controllabel">Kode Kelas</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="kk" 
placeholder="masukan kode" value="<?php echo $data['kode_kelas'];?>"  >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Kelas</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="kelas" placeholder="masukan kelas ex: VII or VIII or IX" value="<?php echo $data['kelas'];?>" >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Nama Kelas</label>
<div class="col-sm-4">
<input type="text" class="form-control"  name="namakls"
placeholder="masukan nama kelas ex: Kelas A" value="<?php echo $data['nama_kelas'];?>" >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Tahun ajar</label>
<div class="col-sm-4">
<input type="text" class="form-control"  name="thn"
placeholder="masukan tahun ajar ex: 2010/2011" value=" <?php echo $data['tahun_ajar'];?>" >
</div>
</div>



<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Guru</label>
<div class="col-sm-4">
<?php
$sql2 = "SELECT DISTINCT kode_guru, nama_guru FROM guru";
									$query2 = $DB_con->prepare($sql2);
									$query2->execute();
									$tahun2 = "";
									$result2 = $query2->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result2 as $row2) {
    								$id2 = $row2['kode_guru'];
    								$nama2=$row2['nama_guru'];
    								$tahun2.='<option value="'.$id2.'">'.$nama2.'</option>';}
?>

                           	<?php 
	


                           			
                            		$sql = "SELECT kelas.*, guru.nama_guru from kelas left join guru on kelas.kode_guru=guru.kode_guru where kode_kelas='$_GET[kode_kelas]'";
									$query = $DB_con->prepare($sql);
									$query->execute();
									$tahun = "";
									$result = $query->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row) {
    								$id = $row['kode_guru'];
    								$nama=$row['nama_guru'];
    								}
								?>
								
								

 							<select name="guru" class="form-control" >	
 							<option><?php echo $nama; ?></option>
							<?php echo $tahun2; ?>
 							</select>
 				
						
							</div>
							</div>
							<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Status</label>
<div class="col-sm-4">

                           	
								<select name="status" class="form-control" >
							<option>Aktif</option>
							<option>Tidak Aktif</option>
 							</select>
						
							</div>
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
ini_set("display_errors",0);

  	                         if (isset($_POST['edit'])) {
                     

                            $sql = "UPDATE kelas set tahun_ajar='$_POST[thn]',kelas='$_POST[kelas]', nama_kelas='$_POST[namakls]', kode_guru='$_POST[guru]', status_aktif='$_POST[status]' where kode_kelas='$_POST[kk]'";
                            $DB_con->exec($sql);

                                   
echo '<script type="text/javascript">

        alert("Berhasil diedit")
        window.location = "kelas.php";
  
</script>';
                     


}


       
?>