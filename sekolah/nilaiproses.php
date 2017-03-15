<div class="container">
<?php include'koneksi.php';
include'header.php';


ini_set("display_errors",0);

if (isset($_GET['id'])) {

	$query=$DB_con->query("SELECT nilai.*, pelajaran.kode_pelajaran, pelajaran.nama_pelajaran, siswa.nama_siswa, siswa.nis , kelas.nama_kelas ,kelas.kelas , guru.kode_guru , guru.nama_guru
                FROM nilai
                LEFT JOIN pelajaran ON nilai.kode_pelajaran = pelajaran.kode_pelajaran
                LEFT JOIN siswa ON nilai.kode_siswa = siswa.kode_siswa
                  LEFT JOIN kelas ON nilai.kode_kelas = kelas.kode_kelas
                  LEFT JOIN guru on nilai.kode_guru=guru.kode_guru
              where id='$_GET[id]'");
	$data  = $query->fetch(PDO::FETCH_ASSOC);
	

		
}



?>



<form class="form-horizontal" role="form" action="nilaiproses.php" method="post" enctype="multipart/form-data">
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title" align="center">
Masukan Data Dengan Benar!
</h2> <a href="kelassiswa.php">
                             <button type="button" class="btn btn-outline btn-primary navbar-btn">Lihat Data</button></a>
</div>
<div class="panel-body">

<?php if (isset($_GET['id'])) : ?>
<input type="text" name="id" value="<?php echo $data['id'];?>"></input>

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
                                 
                            <select name="kelas" class="form-control"  >
                            <option><?php echo $data['kelas'].' '. $data['nama_kelas'];?></option>
                            <?php echo $tahun ;?>
                            </select>
                </div>
    <label for="inputnama" class="col-sm-2 controllabel">Pelajaran</label>
    <div class="col-sm-4">

                             <?php 


                                    
                                    $sql = "SELECT * FROM pelajaran";
                                    $query = $DB_con->prepare($sql);
                                    $query->execute();
                                    $tahun = "";
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row) {
                                    $id3 = $row['kode_pelajaran'];
                                    $nama3=$row['nama_pelajaran'];
                                    
                                    $tahun3.='<option value="'.$id3.'">'.$nama3.'</option>';
                                    }
                                ?>
                                 


                            <select name="pelajaran" class="form-control"  >
                            <option value="<?php echo $data['kode_pelajaran'];?>"><?php echo $data['nama_pelajaran'];?></option>
                            <?php echo $tahun3 ;?>
                            </select>
                </div>

    </div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Nama</label>
<div class="col-sm-4">

                             <?php 


                                    
                                    $sql = "SELECT * FROM siswa";
                                    $query = $DB_con->prepare($sql);
                                    $query->execute();
                                    $tahun = "";
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row) {
                                    $id2 = $row['kode_siswa'];
                                    $nama2=$row['nama_siswa'];
                                    $a=$row['nama_kelas'];
                                    $tahun2.='<option value="'.$id2.'">'.$nama2.' '.$a.'</option>';
                                    }
                                ?>
                                 


                            <select name="siswa" class="form-control"  >
                            <option value="<?php echo $data['kode_siswa'];?>"><?php echo $data['nama_siswa'];?></option>
                            <?php echo $tahun2 ;?>
                            </select>
                </div>
<label for="inputnama" class="col-sm-2 controllabel">Semester</label>
<div class="col-sm-4">



                            <select name="semester" class="form-control"  >
                            <option><?php echo $data['semester'];?></option>
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                           <option>4</option>
                           <option>5</option>
                           <option>6</option>

                            </select>
                </div>
    
    </div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Tugas 1</label>
<div class="col-sm-4">
<input type="text" name="tugas1" class="form-control" value="<?php echo $data['nilai_tugas1'];?>">
</div>
<label for="inputnama" class="col-sm-2 controllabel" >Tugas 2</label>
<div class="col-sm-4">
<input type="text" name="tugas2" class="form-control" value="<?php echo $data['nilai_tugas2'];?>">
</div>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">UTS</label>
<div class="col-sm-4">
<input type="text" name="uts" class="form-control" value="<?php echo $data['nilai_uts'];?>">
</div>
<label for="inputnama" class="col-sm-2 controllabel">UAS</label>
<div class="col-sm-4">
<input type="text" name="uas" class="form-control" value="<?php echo $data['nilai_uas'];?>">
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Keterangan</label>
<div class="col-sm-4">
<textarea name="keterangan" class="form-control"><?php echo $data['keterangan'];?> </textarea>
</div>

<label for="inputnama" class="col-sm-2 controllabel">Guru</label>
<div class="col-sm-4">
 <?php 
  
                                    $sql = "SELECT * FROM guru";
                                    $query = $DB_con->prepare($sql);
                                    $query->execute();
                                    $tahun = "";
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row) {
                                    $id3 = $row['kode_guru'];
                                    $nama3=$row['nama_guru'];
                                    
                                    $guru2.='<option value="'.$id3.'">'.$nama3.'</option>';
                                    }
                                ?>
<select name="guru" class="form-control">
<option value="<?php echo $data['kode'];?>"><?php echo $data['nama_guru'];?></option>
<option><?php echo $guru2 ;?></option></select>
</div>
</div>


</div>
<div class="panel-footer">


<button type="submit" class="btn btn-success" name="update">UPDATE</button>
<a href="nilai.php"> <button type="button" class="btn btn-danger">Batal</button></a>




<?php else : ?>

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
								 


 							<select name="kelas" class="form-control"  >
							<?php echo $tahun ;?>
 							</select>
 				</div>
    <label for="inputnama" class="col-sm-2 controllabel">Pelajaran</label>
 	<div class="col-sm-4">

                             <?php 


                                    
                                    $sql = "SELECT * FROM pelajaran";
                                    $query = $DB_con->prepare($sql);
                                    $query->execute();
                                    $tahun = "";
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row) {
                                    $id3 = $row['kode_pelajaran'];
                                    $nama3=$row['nama_pelajaran'];
                                    
                                    $tahun3.='<option value="'.$id3.'">'.$nama3.'</option>';
                                    }
                                ?>
                                 


                            <select name="pelajaran" class="form-control"  >
                            <?php echo $tahun3 ;?>
                            </select>
                </div>

    </div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Nama</label>
<div class="col-sm-4">

                             <?php 


                                    
                                    $sql = "SELECT * FROM siswa";
                                    $query = $DB_con->prepare($sql);
                                    $query->execute();
                                    $tahun = "";
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row) {
                                    $id2 = $row['kode_siswa'];
                                    $nama2=$row['nama_siswa'];
                                    $a=$row['nama_kelas'];
                                    $tahun2.='<option value="'.$id2.'">'.$nama2.' '.$a.'</option>';
                                    }
                                ?>
                                 


                            <select name="siswa" class="form-control"  >
                            <?php echo $tahun2 ;?>
                            </select>
                </div>
<label for="inputnama" class="col-sm-2 controllabel">Semester</label>
<div class="col-sm-4">



                            <select name="semester" class="form-control"  >
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                           <option>4</option>
                           <option>5</option>
                           <option>6</option>

                            </select>
                </div>
    
    </div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Tugas 1</label>
<div class="col-sm-4">
<input type="text" name="tugas1" class="form-control">
</div>
<label for="inputnama" class="col-sm-2 controllabel">Tugas 2</label>
<div class="col-sm-4">
<input type="text" name="tugas2" class="form-control">
</div>
</div>

<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">UTS</label>
<div class="col-sm-4">
<input type="text" name="uts" class="form-control">
</div>
<label for="inputnama" class="col-sm-2 controllabel">UAS</label>
<div class="col-sm-4">
<input type="text" name="uas" class="form-control">
</div>
</div>
<div class="form-group">
<label for="inputnama" class="col-sm-2 controllabel">Keterangan</label>
<div class="col-sm-4">
<textarea name="keterangan" class="form-control"> </textarea>
</div>

<label for="inputnama" class="col-sm-2 controllabel">Guru</label>
<div class="col-sm-4">
 <?php 
  
                                    $sql = "SELECT * FROM guru";
                                    $query = $DB_con->prepare($sql);
                                    $query->execute();
                                    $tahun = "";
                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($result as $row) {
                                    $id3 = $row['kode_guru'];
                                    $nama3=$row['nama_guru'];
                                    
                                    $guru2.='<option value="'.$id3.'">'.$nama3.'</option>';
                                    }
                                ?>
<select name="guru" class="form-control"><option><?php echo $guru2 ;?></option></select>
</div>
</div>
    </div>

<div class="panel-footer">


<button type="submit" class="btn btn-success" name="simpan">Simpan</button>
<button type="cancel" class="btn btn-danger">Batal</button>


<?php endif ; ?>





</div>
</div>
</form>





<?php
ini_set("display_errors",0);



                if (isset($_POST['simpan'])) {
    

                    $sql = "INSERT INTO nilai VALUES ('','$_POST[semester]','$_POST[pelajaran]','$_POST[guru]','$_POST[kelas]','$_POST[siswa]','$_POST[tugas1]','$_POST[tugas2]','$_POST[uts]','$_POST[uas]','$_POST[keterangan]')";
                        $DB_con->exec($sql);
echo '<script type="text/javascript">

        alert("Berhasil ditambah")
        window.location = "nilai.php";
  
</script>';


                       
                        }


                         if (isset($_POST['update'])) {
                         	ini_set("display_errors",0);
    				

                    $sql = "UPDATE nilai set semester='$_POST[semester]', kode_pelajaran='$_POST[pelajaran]', kode_guru='$_POST[guru]', kode_kelas='$_POST[kelas]', kode_siswa='$_POST[siswa]', nilai_tugas1='$_POST[tugas1]' , nilai_tugas2='$_POST[tugas2]' , nilai_uts='$_POST[uts]', nilai_uas='$_POST[uas]', keterangan='$_POST[keterangan]' where id='$_POST[id]' ";
                        $DB_con->exec($sql);
echo '<script type="text/javascript">

        alert("Berhasil diupdate")
        window.location = "nilai.php";
  
</script>';

                       
                        }
                           


       
?>