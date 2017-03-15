<div class="container">
<?php include'koneksi.php';
include'header.php';
include'headersub.php';

ini_set("display_errors",0);

if (isset($_GET['id'])) {

	$query=$DB_con->query("select * from kelas_siswa where id='$_GET[id]'");
	$data  = $query->fetch(PDO::FETCH_ASSOC);
	$ab=$data['kode_siswa'];

	$query2=$DB_con->query("select * from siswa where kode_siswa='$ab'");
	$data2=$query2->fetch(PDO::FETCH_ASSOC);
	$id2=$data2['kode_siswa'];
	$nama=$data2['nama_siswa'];
	$c.='<option value="'.$id2.'">'.$nama.'</option>';
}

?>



<form class="form-horizontal" role="form" action="kelassiswaproses.php" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title" align="center">
Masukan Data Dengan Benar!
</h2> <a href="kelassiswa.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn">Lihat Data</button></a>
</div>
<div class="panel-body">
<?php if (isset($_GET['id'])) : ?>

<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Nama Siswa</label>
<div class="col-sm-4">

                           	


 						<!-- 	<input name="siswa" class="form-control" value="<?php echo $nama;?>"> -->
							<select name="siswa" class="form-control" >
							<?php echo $c; ?>
 							</select>
 							
 				
						
							</div>
							</div>
							<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Kelas</label>
<div class="col-sm-4">

                           	 <?php 


                           			
                            		$sql = "SELECT * FROM kelas";
									$query = $DB_con->prepare($sql);
									$query->execute();
									$tahun = "";
									$result = $query->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row) {
    								$id = $row['kode_kelas'];
    								$nama=$row['kelas'];
    								$a=$row['nama_kelas'];
    								$tahun.='<option value="'.$id.'">'.$nama.' '.$a.'</option>';
    								}
								?>
								 


 							<select name="kelas" class="form-control" >
							<?php echo $tahun; ?>
 							</select>
 				</div>


</div>
</div>
<div class="panel-footer">


<button type="submit" class="btn btn-success" name="update">Update</button>
<button type="cancel" class="btn btn-danger">Batal</button>

<?php else : ?>



<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Nama Siswa</label>
<div class="col-sm-4">

                           	<?php 


                           			
                            		$sql = "SELECT * FROM siswa WHERE NOT EXISTS (SELECT * FROM kelas_siswa WHERE siswa.kode_siswa = kelas_siswa.kode_siswa)
 ";
									$query = $DB_con->prepare($sql);
									$query->execute();
									$tahun = "";
									$result = $query->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row) {
    								$id = $row['kode_siswa'];
    								$nama=$row['nama_siswa'];
    								$tahun.='<option value="'.$id.'">'.$nama.'</option>';}
								?>
								


 							<select name="siswa" class="form-control"  >
							<?php echo $tahun; ?>
 							</select>
 				
						
							</div>
							</div>
							<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Kelas</label>
<div class="col-sm-4">

                           	 <?php 


                           			
                            		$sql = "SELECT * FROM kelas";
									$query = $DB_con->prepare($sql);
									$query->execute();
									$tahun = "";
									$result = $query->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row) {
    								$id = $row['kode_kelas'];
    								$nama=$row['kelas'];
    								$a=$row['nama_kelas'];
    								$tahun.='<option value="'.$id.'">'.$nama.' '.$a.'</option>';
    								}
								?>
								 


 							<select name="kelas" class="form-control" >
							<?php echo $tahun; ?>
 							</select>
 				</div>
 	
</div>
</div>
<div class="panel-footer">


<button type="submit" class="btn btn-success" name="simpan">Simpan</button>
<button type="cancel" class="btn btn-danger">Batal</button>
 	<?php endif; ?>			


</div>
</div>
</form>

<?php
ini_set("display_errors",0);



                if (isset($_POST['simpan'])) {
    

                    $sql = "INSERT INTO kelas_siswa VALUES ('','$_POST[kelas]','$_POST[siswa]')";
                        $DB_con->exec($sql);
echo '<script type="text/javascript">

        alert("Berhasil ditambah")
        window.location = "kelassiswa.php";
  
</script>';


                       
                        }


                         if (isset($_POST['update'])) {
                         	ini_set("display_errors",0);
    				

                    $sql = "UPDATE kelas_siswa set kode_siswa='$_POST[siswa]', kode_kelas='$_POST[kelas]' where id='$_POST[id]' ";
                        $DB_con->exec($sql);
echo '<script type="text/javascript">

        alert("Berhasil diupdate")
        window.location = "kelassiswa.php";
  
</script>';

                       
                        }
                           


       
?>