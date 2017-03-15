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



<form class="form-horizontal" role="form" action="kelasproses.php" method="post" enctype="multipart/form-data">
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
placeholder="masukan kode"   >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Kelas</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="kelas" placeholder="masukan kelas ex: VII or VIII or IX"  >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Nama Kelas</label>
<div class="col-sm-4">
<input type="text" class="form-control"  name="namakls"
placeholder="masukan nama kelas ex: Kelas A"  >
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Tahun ajar</label>
<div class="col-sm-4">
<input type="text" class="form-control"  name="thn"
placeholder="masukan tahun ajar ex: 2010/2011"  >
</div>
</div>



<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Guru</label>
<div class="col-sm-4">

                           	<?php 


                           			
                            		$sql = "SELECT DISTINCT kode_guru, nama_guru FROM guru";
									$query = $DB_con->prepare($sql);
									$query->execute();
									$tahun = "";
									$result = $query->fetchAll(PDO::FETCH_ASSOC);
									foreach ($result as $row) {
    								$id = $row['kode_guru'];
    								$nama=$row['nama_guru'];
    								$tahun.='<option value="'.$id.'">'.$nama.'</option>';}
								?>
								


 							<select name="guru" class="form-control"  >
							<?php echo $tahun; ?>
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


<button type="submit" class="btn btn-success" name="simpan">Simpan</button>
<button type="cancel" class="btn btn-danger">Batal</button>

</div>
</div>
</form>

<?php
ini_set("display_errors",0);



                if (isset($_POST['simpan'])) {
    

                    $sql = "INSERT INTO kelas VALUES ('$_POST[kk]','$_POST[thn]','$_POST[kelas]','$_POST[namakls]','$_POST[guru]','$_POST[status]')";
                        $DB_con->exec($sql);
echo '<script type="text/javascript">

        alert("Berhasil ditambah")
        window.location = "kelas.php";
  
</script>';


                       
                        }
                           


       
?>